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

$sql = "SELECT * FROM restaurant  ";
$result = mysqli_query($conn, $sql);
$emparray = array();
if (mysqli_num_rows($result) > 0) {
   while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray);
}
else {
  echo "0 results";
}

$conn->close();
?>


    