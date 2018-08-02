<?php
$user_name= "root";
$password= "";
$host= "localhost";
$db_name= "vcare";
$con= mysqli_connect($host,$user_name,$password,$db_name);
$sql= "select * from donation;";
$result= mysqli_query($con,$sql);
$response=array();

while($row=mysqli_fetch_array($result))
{
array_push($response,array("Donor Id: "=>$row["donor_id"],"Amount"=>$row["amount"]));
}
echo json_encode($response);
?>