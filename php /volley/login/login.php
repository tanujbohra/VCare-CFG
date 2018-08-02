<?php
include 'dbh.php';
$email = $_POST['email'];
$password = $_POST['password'];
$response = array();

$checkexistquery = "select name,email from user_info where email like '".$email."' and password like '".$password."';";
$checkexistresult = mysqli_query($conn,$checkexistquery);

if(mysqli_num_rows($checkexistresult)>0){
  $row = mysqli_fetch_array($checkexistresult);
  $name = $row[0];
  $email = $row[1];
  $code = "login_success";
  array_push($response,array("code"=>$code,"name"=>$name,"email"=>$email));
  echo json_encode($response);
}else {
  $code = "login_failed";
  $message = "User not found...Please try again...";
  array_push($response,array("code"=>$code,"message"=>$message));
  echo json_encode($response);
}
mysqli_close($conn);
 ?>
