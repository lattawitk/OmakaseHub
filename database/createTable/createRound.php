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
$sql = "CREATE TABLE Round (
roundID VARCHAR(10) NOT NULL,
restaurantID  VARCHAR(10) NOT NULL,
date DATE NOT NULL,
time VARCHAR(20) NOT NULL,
seat INT(10) NOT NULL,
seatbooking INT(10) NOT NULL,
PRIMARY KEY (roundID)
);";


if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>