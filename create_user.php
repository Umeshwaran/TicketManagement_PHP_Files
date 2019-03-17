<?php
require 'connect.php';

$response=array();

$name=$_POST["name"];
$loc=$_POST["loc"];
$ucode=$_POST["usercode"];
$contact=$_POST["cont"];
$flag=$_POST["flag"];
$sql = "INSERT INTO `users` (`ID`, `Name`, `Password`, `Code`, `Location`, `Contact`,`Approved`) VALUES (NULL, '$name', '1234', '$ucode', '$loc', '$contact','$flag')";
//$sql = "INSERT INTO `users` (`ID`, `Name`, `Password`, `Code`, `Location`, `Contact`,'Approved') VALUES (NULL, 'User', '1234', 'U', 'chrni', '123','0');";

$result=mysqli_query($conn,$sql);

	 $code="create";
	 $message="Created successfully";
    
    array_push($response, array("code"=>$code,"message"=>$message));
    print_r(json_encode(array('create'=>$response)));
	
?>