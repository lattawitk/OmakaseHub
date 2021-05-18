<?php

session_start();
session_unset();
echo "<script type='text/javascript'>alert('Sign out successful !!');
            window.location='index.php';
            </script>";
// header("Location:index.php");

?>