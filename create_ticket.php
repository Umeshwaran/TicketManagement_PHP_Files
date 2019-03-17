<?php
require 'connect.php';

$response=array();

$title=$_POST["title"];
$desc=$_POST["desc"];
$created=$_POST["created"];
$loc=$_POST["locat"];
$contact=$_POST["contact"];
$assign=$_POST["assign"];
$status=$_POST["status"];

$sql = "INSERT INTO `ticket` (`Title`, `TID`, `description`, `created_by`, `status`, `Location`, `Contact`, `assigned_to`) VALUES ('$title', NULL, '$desc', '$created', '$status', '$loc', '$contact', '$assign')";
$result=mysqli_query($conn,$sql);

	 $code="created";
	 $message="Created successfully";
    
    array_push($response, array("code"=>$code,"message"=>$message));
    print_r(json_encode(array('create'=>$response)));
	

?>