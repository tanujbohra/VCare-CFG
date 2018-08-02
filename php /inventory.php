

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vcare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// $value    = $conn->real_escape_string($_POST['value']);
$value= 100;


$query   ="SELECT  `medical-kit` FROM `inventory` where id=1";
$result = $conn->query($query);
$row=mysqli_fetch_row($result);
//$response=array();
//array_push($response,array("
echo $row[0];

$conn->close();
?>
