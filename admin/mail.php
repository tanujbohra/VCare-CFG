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
if (isset($_REQUEST['email']))  {
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $comment=$_POST['comment'];
require 'PHPMailer/PHPMailerAutoload.php';
$to=$email;
$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = '2015rahul.jaisinghani@ves.ac.in';
$mail->Password = 'POILKJMNB';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->From = 'rahuljaisinghani1997@gmail.com';
$mail->FromName = 'Rahul';
$mail->addAddress($to);

$mail->isHTML(true);
$mail->Subject = "NewUser";
$mail->Body    = "\nThe person visited your site is  ".'Rahul'."\nHis/Her Email  ".$email."\nHis/Her Subject  ".$subject."\nHis/Her Message  ".$comment;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send())
{
    echo 'Email could not be sent.';
}
else
{
    echo 'Mail Sent Successfully';
}}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="css/tables.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>


    <![endif]-->

</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="index.html">Vcare</a></h1>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="profile.html">Profile</a></li>
                                    <li><a href="login.html">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="row">
        <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="Donor.php.php"><i class="glyphicon glyphicon-home"></i> Donor</a></li>
                    <li class="current" ><a href="Volunteer.php"><i class="glyphicon glyphicon-user"></i>Volunteer</a></i>
                    <li><a href="Patient.php"><i class="glyphicon glyphicon-user"></i>Patient</a></i>
                    <li><a href="Programs.php"><i class="glyphicon glyphicon-user"></i> Programs</a></li>
                    <li><a href="Budget.php"><i class="glyphicon glyphicon-book"></i> Budget</a></li>
                    <li><a href="Inventory.php"><i class="glyphicon glyphicon-ban-circle"></i>Inventory</a></li>


                </ul>
            </div>
        </div><div class="col-md-10">

            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">Mail System</div>
                </div>
                <div class="panel-body" style="overflowauto;">
                    <div class="col-xs-4"></div><div class="col-xs-4">
                        <form method="post" name="ContactForm" >
                            <h1>Mail:</h1>

                            <div class="contentform">
                                <div class="form-group">
                                    <p>Email<span>*</span></p>
                                    <span class="icon-case"></span>
                                    <input type="email" class="form-control" name="email"/>
                                </div>
                                <div class="form-group">
                                    <p>Subject<span>*</span></p>
                                    <span class="icon-case"></span>
                                    <input type="text" name="subject" class="form-control" value="VCARE "/>
                                </div>
                                <div class="form-group">
                                    <p>Message<span>*</span></p>
                                    <span class="icon-case" ></span>
                                    <input type="text" name="comment" class="form-control" rows="15" cols="40" value=""/>
                                </div>



                                <button type="submit" class="btn btn-primary center-block pull-right" >Submit</button>

                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>

<footer>
    <div class="container">

        <div class="copy text-center">
            <a href='#'>Website</a>
        </div>

    </div>
</footer>

<link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/table1.js"></script>
<!-- jQuery UI -->
<script src="js/table2.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

<script src="vendors/datatables/dataTables.bootstrap.js"></script>

<script src="js/custom.js"></script>
<script src="js/tables.js"></script>
</body>
</html>
