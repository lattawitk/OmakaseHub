<?php
$servername = "127.0.0.1:49696";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "omakase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();
//$_SESSION["rest_id"] = "OMK001";
//$_SESSION["cus_id"] = '1';

$sql = "UPDATE booking SET status = '1' where bookingID = ?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $_POST["bookID"]);
$stmt->execute();


$sql = "DELETE from bookingSeat where bookingID = ?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $_POST["bookID"]);
$stmt->execute();

echo "done";
  

$conn->close();
?>