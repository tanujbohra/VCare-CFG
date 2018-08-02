<?php
$user_name= "root";
$password= "";
$host= "localhost";
$db_name= "user_db";
$con= mysqli_connect($host,$user_name,$password,$db_name);
$sql= "select Name, Email, Mobile from user_info";
$result= mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0)
{
	while($row= mysqli_fetch_assoc($result))
	{
	
	
	echo "<br>Name: ". $row["Name"]. "\t"."Email: ". $row["Email"]."\t".  "Mobile: ". $row["Mobile"] . "<br>";
	
	}
}
else
{
echo "No results";
}

$con->close();
?>