<?php

    $link = mysqli_connect("127.0.0.1:49696", "azure", "6#vWHD_$", "omakase");
 
    // check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
 
    $name = "";
    $telephone = "";
    $email = "";
    $username = "";
 
    if (isset($_POST['submit'])) {
      	$name = $_POST['name'];
      	$telephone = $_POST['telephone'];
      	$email = $_POST['email'];
      	$username = $_POST['username'];
      	$password = $_POST['password_1'];
      	$confirmpassword = $_POST['password_2'];
    
        $sql_n = "SELECT * FROM customer WHERE name='$name'";
      	$sql_t = "SELECT * FROM customer WHERE tel='$telephone'";
        $sql_e = "SELECT * FROM customer WHERE email='$email'";
      	$sql_u = "SELECT * FROM customer WHERE username='$username'";
      	$res_n = mysqli_query($link, $sql_n);
      	$res_t = mysqli_query($link, $sql_t);
        $res_e = mysqli_query($link, $sql_e);
      	$res_u = mysqli_query($link, $sql_u);

        // check password match
        if ($password != $confirmpassword) {
            
            echo "<script type='text/javascript'>alert('Password not match !!');
            window.location='signup.php';
            </script>";  
        
        // check existed    
        } else if (mysqli_num_rows($res_n) > 0) {
            
  	        echo "<script type='text/javascript'>alert('Name is already existed !!');
            window.location='signup.php';
            </script>"; 

        } else if (mysqli_num_rows($res_t) > 0) {
            
  	        echo "<script type='text/javascript'>alert('Telephone is already existed !!');
            window.location='signup.php';
            </script>"; 
            
        } else if (mysqli_num_rows($res_e) > 0) {
            
  	        echo "<script type='text/javascript'>alert('Email is already existed !!');
            window.location='signup.php';
            </script>"; 
            
        } else if (mysqli_num_rows($res_u) > 0) {
            
  	        echo "<script type='text/javascript'>alert('Username is already existed !!');
            window.location='signup.php';
            </script>";   
            
        // insert registration                                     
        } else {
         
            $password = md5($password);
            $query = "INSERT INTO customer (name, tel, email, username, password) VALUES ('$name', '$telephone', '$email', '$username', '$password')";
            $results = mysqli_query($link, $query);
            echo "<script type='text/javascript'>alert('Successful !!');
            window.location='index.php';
            </script>";  
               
        } 
    }              
     
    // Close connection
    mysqli_close($link);
    
?>

