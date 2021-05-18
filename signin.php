<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <?php require 'heading/head.php'; ?>
     
    <title> Sign In </title>
    <link rel="stylesheet" href="css/regis-css.css">

</head>
<body>
    <?php require'heading/navbar.php'; ?>
    <!--UI-->
    <div class="header"> 
        <h2 style ="color:#D4B22C;"> Sign In </h2>
    </div>
    
    <form action="signinback.php" method="POST"> 
      <div class="input-group"> 
          <label for="username"> Username </label>
          <input type="text" name="username" id="username" required>
      </div>   
      <div class="input-group"> 
          <label for="password_1"> Password </label>
          <input type="password" name="password_1" required>
      </div>  
      <div class="input-group"> 
          <button type="submit" name="submit" value = "Submit" class="btn" style ="color:#D4B22C;"> Sign In </button>
      </div>
      <p> Not yet a member? <a href="signup.php" style ="color:#D4B22C;"> Sign Up </a></p>       
    </form> 


</body>
</html>