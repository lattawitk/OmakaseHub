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
//$_SESSION["review_id"] = "1";
//$_SESSION["username"] = "test";


$sql = "INSERT INTO Review(bookingID,name,restaurantID,score,reviewDetail) VALUES (?,?,?,?,?)"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("sssss",$_SESSION["review_id"],$_SESSION["username"],$_POST["restaurantID"],$_POST["score"],$_POST["reviewDetail"]);
$stmt->execute();

$sql = "UPDATE booking SET reviewCheck = '1' where bookingID = ?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s",$_SESSION["review_id"]);
$stmt->execute();

echo "done";
  

$conn->close();
?>