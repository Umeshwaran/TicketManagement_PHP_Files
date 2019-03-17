<?php
require 'connect.php';
$id=$_POST["id"];
//$id='2';

// $name='User';
// $pass='1234';

$sql = "DELETE FROM `users` WHERE `users`.`ID` = '$id'";
$result = mysqli_query($conn,$sql);
$response=array();

    // output data of each row
    $row = mysqli_fetch_row($result);

    $code="deleted";
    array_push($response, array("code"=>$code));
   // echo json_encode(array('login'=>$response));
     print_r(json_encode(array('delete'=>$response)));  



?>