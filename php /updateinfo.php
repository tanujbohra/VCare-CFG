<?php

$user_name=$_POST["name"];
$user_pass=$_POST["email"];
$user = "root";
$password= "";
$host= "localhost";
$db_name= "user_db";

$con= mysqli_connect($host,$user,$password,$db_name);

$sql= "insert into user_information values('".$user_name."','".$user_pass."');";

if(mysqli_query($con,$sql))
{
	echo "Data insertion success..";
}
else
{
	echo "Data insertion failiure..";
}
mysqli_close($con);

?>