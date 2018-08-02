

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

$ID    = $conn->real_escape_string($_POST['id']);
$Name    = $conn->real_escape_string($_POST['name']);
$Gender    = $conn->real_escape_string($_POST['gender']);
$Hospital = $conn->real_escape_string($_POST['hospital']);
$CancerType = $conn->real_escape_string($_POST['cancer_type']);
$ProgramType = $conn->real_escape_string($_POST['program_type']);
$V_id = $conn->real_escape_string($_POST['v_id']);




$query   ="INSERT INTO patients VALUES ('".$ID."','".$Name."','".$Gender."','".$Hospital."','".$CancerType."','".$ProgramType."','".$V_id."');";


$result = mysqli_query($conn,$query);
$conn->close();
?>
