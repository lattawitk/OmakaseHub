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

// sql to create table
$sql = "CREATE TABLE Review (
bookingID INT(6) NOT NULL,
name VARCHAR(50) NOT NULL,
restaurantID  VARCHAR(10) NOT NULL,
score INT(6) NOT NULL,
reviewDetail VARCHAR(200) NOT NULL
);";


if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>