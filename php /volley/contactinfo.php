<?php
include 'dbh.php';
$sql = "select * from contact_info";
$result = mysqli_query($conn,$sql);
$response = array();

while($row = mysqli_fetch_array($result)){
  array_push($response,array("Name"=>$row["name"],"Email"=>$row["email"]));
}

echo json_encode($response);
 ?>
