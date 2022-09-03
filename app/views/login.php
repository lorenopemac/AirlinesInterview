<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="auth" method="post">

        <h2>LOGIN</h2> 

        <label>Airline</label>

        <input type="text" name="airline" placeholder="Airline"><br>

        <label>User Name</label>

        <input type="text" name="username" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <label>Remember me:</label>

        <input type="checkbox" name="remember_me"><br> 

        <button type="submit">Login</button>
 
     </form>

</body>
     
</html>

<?php  echo 'ee';//var_dump($this->data["airlines"]); ?>