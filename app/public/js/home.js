/**
 * Datepicker with Jquery
 */
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
    $(document).ajaxStart(function () {
        $("#results").empty()
        $loading.show();
    }).ajaxStop(function () {
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
                    </div>
                    <br> `
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