<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vcarefin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$value  = $conn->real_escape_string($_POST['medicalkit']);
$id  = $conn->real_escape_string($_POST['id']);

$value=(int)$value;
$id=(int)$id;


$query   ="INSERT INTO inventory VALUES ('".$id."','".$value."');";


$result = mysqli_query($conn,$query);



$conn->close();
?>

