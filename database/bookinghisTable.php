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
//$_SESSION["cus_id"] = "1";

$sql = " SELECT booking.bookingID,restaurant.restaurantName,round.Date,round.Time,booking.bookSeat,booking.status,booking.reviewCheck FROM restaurant
             INNER JOIN booking
             ON restaurant.restaurantID=booking.restaurantID
              INNER JOIN round
             ON  booking.roundID=round.roundID where cusID =?";
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $_SESSION["cus_id"]);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
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