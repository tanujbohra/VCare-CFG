<?php

$host="localhost";
$username="root";    			// id2784862_root specify the sever details for mysql
$password="";              //pass@123
$database="VCARE";              //id2784862_iadmin
$conn = mysqli_connect($host,$username,$password, $database);

$query = "select SUM(amount) from donor_transaction";
$result = $conn->query( $query );
while($row=mysqli_fetch_array($result))
    $y = $row['SUM(amount)'];
$query = "select * from programs";
$result = $conn->query( $query );
//$q1="select rank from programs"
//$result2 = $conn->query( $q1 );
$res = array();
$inc=0;
while($row2=mysqli_fetch_array($result))
{
    $res[$inc]=(($y/28)*$row2['ranking'])/100;
    $inc++;
}
$dataPoints = array(
    array("label"=>"General Info", "y"=>$res[0]),
    array("label"=>"Nutritional Support", "y"=>$res[1]),
    array("label"=>"Counselling", "y"=>$res[2]),
    array("label"=>"Palliative Support", "y"=>$res[3])
)

?>
<!DOCTYPE HTML>
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
    <script>
        window.onload = function() {


            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "theme2",
                animationEnabled: true,
                title: {
                    text: "Budget"
                },
                data: [{
                    type: "pie",
                    indexLabel: "{y}",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bolder",
                    showInLegend: true,
                    legendText: "{label}",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
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
                    <li class="current" ><a href="Volunteer.php"><i class="glyphicon glyphicon-user"></i>Volunteer</a></li>
                    <li><a href="Patient.php"><i class="glyphicon glyphicon-user"></i>Patient</a></li>
                    <li><a href="Programs.php"><i class="glyphicon glyphicon-user"></i> Programs</a></li>
                    <li><a href="Budget.php"><i class="glyphicon glyphicon-book"></i> Budget</a></li>
                    <li><a href="Inventory.php"><i class="glyphicon glyphicon-ban-circle"></i>Inventory</a></li>


                </ul>
            </div>
        </div><div class="col-md-10">

            <div class="content-box-large">
                <div class="panel-heading">
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></div></div></div>


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