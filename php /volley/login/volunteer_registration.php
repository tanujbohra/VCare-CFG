<?php
include 'dbh.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$location = $_POST['location'];
$preference = $_POST['preference'];
$phoneno = $_POST['phoneno'];

$checkexistquery = "select * from volunteer_details where email like '".$email."';";

$checkexistresult = mysqli_query($conn,$checkexistquery);
$response = array();
if(mysqli_num_rows($checkexistresult)>0){
  $code = "reg_failed";
  $message  = "User already exist...";
  array_push($response,array("code"=>$code,"message"=>$message));
  echo json_encode($response);
}else{
  $insertquery = "INSERT INTO volunteer_details (name,email,password,location,preference,phone_no)
  VALUES ('".$name."','".$email."','".$password."','".$location."','".$preference."','".$phoneno."')";
  //$insertquery = "insert into user_info values ('".$name."','".$email."','".$password."');";
  $insertresult = mysqli_query($conn,$insertquery);
  $code = "reg_success";
  $message  = "You have been successfully registered  ";
  array_push($response,array("code"=>$code,"message"=>$message));
  echo json_encode($response);
}
mysqli_close($conn);
 ?>
