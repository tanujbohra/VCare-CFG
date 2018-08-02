<?php
 //Create connection
//$conn = new mysqli($servername, $username, $password);
/*$connect=mysqli_connect('localhost','root','','iadmin');
 //Check connection
//if ($connect->connect_error) {
    //die("Connection failed: " . $connect->connect_error);
//} 
//echo "Connected successfully";
$name=$_POST['name'];
$email=$_POST['email'];
//$phoneno=$_POST['phone'];
$subject=$_POST['subject'];
$message=$_POST['message'];
mysqli_query($connect,"INSERT INTO contactus(Name,mail,Subject,Message)
		        VALUES ('$name','$email','$subject','$message')");
/*
if(mysqli_affected_rows($connect) > 0){
	//echo "<p>guest Added</p>";
} else {
	//echo "guest NOT Added<br />";
	echo mysqli_error ($connect);
    }
*/
// Enter your email, where you want to receive the messages.

        
//    send_mail($to, $body);
	require 'PHPMailer/PHPMailerAutoload.php';
    $to="rahuljaisinghani1997@gmail.com";
	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = '2015rahul.jaisinghani@ves.ac.in';
	$mail->Password = 'POILKJMNB';
	$mail->SMTPSecure = 'ssl';
	$mail->Port = 465;
	
	$mail->From = 'unitedgulfsafety@gmail.com';
	$mail->FromName = $name;
	$mail->addAddress($to);
	
	$mail->isHTML(true); 
	$mail->Subject = "NewUser";
	$mail->Body    = "\nThe person visited your site is  ".$name."\nHis/Her Email  ".$email."\nHis/Her Subject  ".$subject."\nHis/Her Message  ".$message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
	
	if(!$mail->send())
	{
		echo 'Email could not be sent.';
	} 
	else 
	{
		echo 'Your Details have been received ..Will come back to you soon!';
	}