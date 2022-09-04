<!DOCTYPE html>
<html>

<body> 
    <!-- Header -->
    <?php require_once 'app/views/layout/header.php' ?>

    <!-- hello message -->
    <h1><?php echo 'Welcome '.$this->data["user"]->getUsername() ?></h1>
    
    <!-- Filter inputs -->
    <div class="container">  
            <div class="form-row">
                <div class="col-4">
                    <label class="form-label" for="city"><Caption>City</Caption></label>
                    <input type="text" id="city" class="form-control" name="city" >
                </div> 
                <div class="col-2">
                    <label class="form-label" for="fromDate"><Caption>From date</Caption></label>
                    <input type="date" id="fromDate" class="form-control"  name="checkin" value=""> 
                </div>
                <div class="col-2">
                    <label class="form-label" for="toDate"><Caption>To date</Caption></label>
                    <input type="date" id="toDate" class="form-control" name="checkout" value=""></p>
                </div>
                <div class="col-2">
                    <label class="form-label" for="guests"><Caption>Number of Guests</Caption></label>
                    <!-- static to 4 elements -->
                    <select id="guests" class="custom-select" name="guests"> 
                        <option value="">Please select</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select> 
                </div>
            </div> 
            <div class="form-row">
                <button type='text' id="btn_search" class="btn btn-primary my-1">Search</button>
            </div>   
    </div> 
    
    <!-- Hide message, its triggered when ajax call is being made -->  
    <div class="container alert alert-primary" id="loadingDiv"> 
        Loading data... 
    </div> 

    <!-- Div that contains all result after a search is made -->
    <div class="container" id="results"></div> 

</body>
</html> 
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script>
    $(function() {
        var from = $( "#fromDate" )
        .datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true
        })
        .on( "change", function() {
            to.datepicker( "option", "minDate", getDate( this ) );
        }),
        to = $( "#toDate" ).datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true
        })
        .on( "change", function() {
            from.datepicker( "option", "maxDate", getDate( this ) );
        });

        function getDate( element ) {
            var date;
            var dateFormat = "yy-mm-dd";
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }

            return date;
        }
    });

    $(document).ready(function(){

        /** 
        * Show loading div when ajax call is being process
        */
        var $loading = $('#loadingDiv').hide();
        $(document)
        .ajaxStart(function () {
            $("#results").empty()
            $loading.show();
        })
        .ajaxStop(function () {
            $loading.hide();
        });

        /**
         * Listen to click event for search button
         * when is trigger make an ajax call to get hotels data
         */
        $("#btn_search").click(function(){   
            var html_response = '';
            //verify if all inputs are not empty
            if($("#city").val()!='' && $("#fromDate").val()!='' && $("#toDate").val()!='' && $("#guests").val()!='')
            { 
                $.ajax({
                    type: 'GET',
                    url: '/bookingsearch',
                    data: {
                        city: $("#city").val(), 
                        checkin: $("#fromDate").datepicker("getDate").toISOString(), 
                        checkout: $("#toDate").datepicker("getDate").toISOString(), 
                        guests: $("#guests").val(), 
                    },
                    success: function(response) {   
                        //if successful it return a JSON with all hotels else it return an empty JSON
                        var result = JSON.parse(response)  
                        html_response = buid_html_cards(result)
                        //Append the html tags to DOM
                        $("#results").empty()
                        $("#results").append( html_response ); 
                    }
                });
            }else{
                //Some inputs are empty, return html code with message
                html_response = `
                    <div class="alert alert-warning" role="alert">
                       All fields are required.
                    </div>
                `
                //Append the html tags to DOM
                $("#results").empty()
                $("#results").append( html_response ); 
            } 
        });

        /**
         * Get params array result with hotels data
         */
        function buid_html_cards(result)
        {
            var html_response = ''
            if(result.length > 0){ 
                result.forEach(function(hotel) {
                    //create html card code for each hotel
                    html_response = html_response+`
                        <div class='card text-center'> 
                            <div class='card-body'>
                                <h5 class='card-title'>`+hotel['name']+`</h5>
                                <p class='card-text'>Price: $`+hotel['subtotal']+` </p>
                                <p class='card-text'>From date: `+hotel['checkin']+` to `+hotel['checkout']+` </p> 
                                <a href='#' class='btn btn-primary'>See more</a>
                            </div>
                            <div class='card-footer text-muted'>
                                For: `+hotel['nights']+` nights
                            </div>
                        </div> `
                });
            }else{
                //if hotel data is empty then return message 
                html_response = `
                    <div class="alert alert-warning" role="alert">
                        No match found.
                    </div>
                `
            }
            return html_response;
        }
    });

</script>