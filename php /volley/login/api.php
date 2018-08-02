<?php
include 'dbh.php';
$response = array();
array_push($response,array("webformatURL"=>"http://10.49.51.222/android.png","likes"=>"1","user"=>"Tanuj1"));
array_push($response,array("webformatURL"=>"http://10.49.51.222/android.png","likes"=>"2","user"=>"Tanuj2"));
array_push($response,array("webformatURL"=>"http://10.49.51.222/android.png","likes"=>"3","user"=>"Tanuj3"));
array_push($response,array("webformatURL"=>"http://10.49.51.222/android.png","likes"=>"4","user"=>"Tanuj4"));
array_push($response,array("webformatURL"=>"http://10.49.51.222/android.png","likes"=>"5","user"=>"Tanuj5"));

echo json_encode($response);
?>
