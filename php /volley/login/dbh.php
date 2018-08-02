<?php
$conn = mysqli_connect("localhost","root","","vcare");

if(!$conn){
  die("Connection failed:".mysqli_connect_error());
}
?>
