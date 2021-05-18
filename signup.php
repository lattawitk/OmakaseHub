<!DOCTYPE html>
<html lang="en">
<head>
     <?php require 'heading/head.php'; ?>
     
    <title> Sign Up </title>
    <link rel="stylesheet" href="css/regis-css.css">

</head>
<body>
    <?php require'heading/navbar.php'; ?>
    <!--UI-->
    <div class="header"> 
        <h2 style ="color:#D4B22C;"> Sign Up </h2>
    </div>
    
    <form action="signupback.php" method="POST">
      <div class="input-group"> 
          <label for="name"> Name </label>
          <input type="text" name="name" id="name" placeholder="ex. Omakase Hub" pattern=".{1,50}" required>
      </div>
      <div class="input-group"> 
          <label for="telephone"> Telephone </label>
          <input type="tel" name="telephone" id="telephone" placeholder="ex. 0XX-XXX-XXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
      </div>    
      <div class="input-group"> 
          <label for="email"> Email </label>
          <input type="email" name="email" id="email" placeholder="ex. omakasehub@gmail.com" required>
      </div>     
      <div class="input-group"> 
          <label for="username"> Username </label>
          <input type="text" name="username" id="username" placeholder="ex. Omakase_Hub" pattern=".{1,30}" required>
      </div>   
      <div class="input-group"> 
          <label for="password_1"> Password </label>
          <input type="password" name="password_1" required>
      </div>  
      <div class="input-group"> 
          <label for="password_2"> Confirm Password </label>
          <input type="password" name="password_2" required>
      </div>  
      <div class="input-group"> 
          <button type="submit" name="submit" value = "Submit" class="btn" style ="color:#D4B22C;"> Sign Up </button>
      </div>
      <p> Already a member? <a href="signin.php" style ="color:#D4B22C;"> Sign In </a></p>       
    </form> 


</body>
</html>