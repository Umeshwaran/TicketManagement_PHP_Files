<?php
require 'connect.php';
$id=$_POST["id"];

$fcm=$_POST["fcm"];


// $id="21";
//$fcm="Edited";
// $desc="Edited for testingggggg";
// $status="3";
// $assign="2";

// $name='User';
// $pass='1234';

$sql = "UPDATE `users` SET `users`.`Fcm` = '$fcm' WHERE `users`.`ID` = '$id';";
$result = mysqli_query($conn,$sql);
$response=array();
if ($sql) {
    
    $code="success";
    array_push($response, array("code"=>$code));
   // echo json_encode(array('login'=>$response));
     print_r(json_encode(array('savefcm'=>$response)));  }


$conn->close();
?>