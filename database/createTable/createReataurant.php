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
$sql = "CREATE TABLE Restaurant (   
restaurantID VARCHAR(10) PRIMARY KEY,
restaurantName VARCHAR(50) NOT NULL,
chefName VARCHAR(50) NOT NULL,
restaurantDetail VARCHAR(100),
address VARCHAR(100) NOT NULL,
tel VARCHAR(15) NOT NULL,
price INT(5) NOT NULL,
course INT(5) NOT NULL
);";


if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>