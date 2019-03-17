<?php
require 'connect.php';

$response=array();

$name=$_POST["name"];
$loc=$_POST["location"];
$contact=$_POST["contact"];
$pwd=$_POST["pass"];

$sql = "INSERT INTO `users` (`ID`, `Name`, `Password`, `Code`, `Location`, `Contact`) VALUES (NULL, '$name', '$pwd', 'E', '$loc', '$contact')";
//$sql="INSERT INTO `users` (`ID`, `Name`, `Password`, `Code`, `Location`, `Contact`) VALUES (NULL, 'Umesh12', '1234', 'E', 'chfmjg', '1243');";
$result=mysqli_query($conn,$sql);

	 $code="success";
	 $message="Engineer created successfully";
	 
    
    array_push($response, array("code"=>$code,"message"=>$message));
    print_r(json_encode(array('success'=>$response)));
	

?>