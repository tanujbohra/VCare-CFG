<?php
 
$host="localhost";
 $username="root";    			// id2784862_root specify the sever details for mysql
 $password="";              //pass@123
 $database="care";              //id2784862_iadmin
$conn = mysqli_connect($host,$username,$password, $database);

    $query = "select SUM(amount) from donation";
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
        $res[$inc]=(($y/28)*$row2['rank'])/100;
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>       