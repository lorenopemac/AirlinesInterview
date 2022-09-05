<!DOCTYPE html>
<html>

<body> 
    <!-- Header -->
    <?php require_once 'app/views/layout/header.php' ?>
    <script type="text/javascript" src="app/public/js/home.js"></script>

    <!-- hello message -->
    <div class="container">  
        <h3><?php echo 'Welcome '.$this->data["user"]->getUsername() ?></h3>
    </div>
    <!-- Filter inputs -->
    <div class="container">  
            <div class="form-row">
                <div class="col-4">
                    <label class="form-label" for="city"><Caption>City</Caption></label>
                    <input type="text" id="city" class="form-control" name="city" >
                </div> 
                <div class="col-2">
                    <label class="form-label" for="fromDate"><Caption>From date</Caption></label>
                    <input type="text" id="fromDate" class="form-control"  name="checkin" value="" autocomplete="off"> 
                </div>
                <div class="col-2">
                    <label class="form-label" for="toDate"><Caption>To date</Caption></label>
                    <input type="text" id="toDate" class="form-control" name="checkout" value="" autocomplete="off"></p>
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
    

</script>