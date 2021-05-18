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

$sql = "SELECT r.roundID,r.restaurantID,r.date,r.time,r.seat, r.seat-ifnull(b.sumseat,0) as remainSeat FROM round as r 
left join  (SELECT roundID,sum(bookSeat)as sumseat FROM bookingSeat group by roundID) as b  on r.roundID = b.roundID
where  restaurantID = ?"; // SQL with parameters
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $_SESSION["rest_id"]);
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