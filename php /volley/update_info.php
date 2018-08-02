<?php
include 'dbh.php';
$user_name = $_POST["name"];
$user_pass = $_POST["email"];
$sql = "insert into contact_info values('".$user_name."','".$user_pass."');";
if(mysqli_query($conn,$sql)){
  echo "Data insertion success";
}else{
  echo "Data insertion failure";
}
mysqli_close($conn);
 ?>
