<!DOCTYPE html>

<html>

<head> 
    <title>LOGIN</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
 </head>

<body>

<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100"> 
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        
        <form action="auth" method="post">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Sign in</p>
            </div>

            <div class="divider d-flex align-items-center my-4"> </div>
            

            <!-- Airline list -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form3Example3">Airline</label>
              <select  name="airline" class="form-select" aria-label="Default select example">
                  <option selected="selected">Choose one</option>
                  <?php  
                      foreach($this->data["airlines"] as $airline){
                          echo "<option value='".$airline["code"]."'>".$airline["name"]."</option>";
                      }
                  ?>
              </select>
            </div>

            <!-- User input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form_username">User</label>
                <input type="text" id="form_username"  name="username"class="form-control form-control-lg"
                placeholder="Enter a valid user" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="form_password">Password</label>
                <input type="password" id="form_password" name="password" class="form-control form-control-lg"
                placeholder="Enter password" />
            </div>

            <!-- Checkbox -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="checkbox_remember" />
                <label class="form-check-label" name="remember_me" for="checkbox_remember">
                    Remember me
                </label>
                </div> 
            </div>

            <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button> 
            </div>

        </form>
      </div>
    </div>
  </div>
   
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
     
</html>

<?php  echo 'ee';//var_dump($this->data["airlines"]); ?>