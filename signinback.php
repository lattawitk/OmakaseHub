<?php

    session_start();

    $link = mysqli_connect("127.0.0.1:49696", "azure", "6#vWHD_$", "omakase");
 
    // check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
 
    $username = "";
 
    if (isset($_POST['submit'])) {
      	$username = $_POST['username'];
      	$password = $_POST['password_1'];
        $password = md5($password);
    
      	$sql_c = "SELECT * FROM customer WHERE username='$username' and password='$password' ";
        $res_c = mysqli_query($link, $sql_c);
        $row_c = mysqli_fetch_array($res_c);
        if(is_array($row_c))
        {
            $_SESSION["cus_id"] = $row_c['cusID'];
            $_SESSION["username"] = $row_c['username'];
            echo "<script type='text/javascript'>alert('Welcome to OmakaseHub !!');
            window.location='index.php';
            </script>";  
        }
        else
        {
            echo "<script type='text/javascript'>alert('Invalid username or password !!');
            window.location='signin.php';
            </script>"; 
        }        
    }              
     
    // Close connection
    mysqli_close($link);
    
?>

