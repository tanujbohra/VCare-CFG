<?php
include 'dbh.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$location = $_POST['location'];
$aadhar = $_POST['aadhar'];
$dob = $_POST['dob'];

$checkexistquery = "select * from donor_details where email like '".$email."';";

$checkexistresult = mysqli_query($conn,$checkexistquery);
$response = array();
if(mysqli_num_rows($checkexistresult)>0){
  $code = "reg_failed";
  $message  = "User already exist...";
  array_push($response,array("code"=>$code,"message"=>$message));
  echo json_encode($response);
}else{
  $insertquery = "INSERT INTO donor_details (name,email,password,location,aadhar_no,dob)
  VALUES ('".$name."','".$email."','".$password."','".$location."','".$aadhar."','".$dob."');";
  $insertresult = mysqli_query($conn,$insertquery);
  $code = "reg_success";
  $message  = "You have been successfully registered  ";
  array_push($response,array("code"=>$code,"message"=>$message));
  echo json_encode($response);
}
mysqli_close($conn);
 ?>
