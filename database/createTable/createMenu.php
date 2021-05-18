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
$sql = "CREATE TABLE Menu (
restaurantID VARCHAR(10) NOT NULL,
menuOrder INT(2) NOT NULL,
menuName VARCHAR(30) NOT NULL
);";


if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>