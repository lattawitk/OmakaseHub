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

$sql = "INSERT INTO Booking( restaurantID, cusID, roundID, status, bookSeat, reviewCheck) VALUES (?,?,?, 0 , ?,0)"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("sssi", $_SESSION["rest_id"],$_SESSION["cus_id"],$_POST["roundID"],$_POST["seat"]);
$stmt->execute();

$sql = "INSERT INTO BookingSeat(roundID, bookSeat) VALUES (?,?)"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("si",$_POST["roundID"],$_POST["seat"]);
$stmt->execute();

echo "done";
  

$conn->close();
?>