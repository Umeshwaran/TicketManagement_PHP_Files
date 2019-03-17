<?php
require 'connect.php';
 $id=$_POST["id"];
$title=$_POST["title"];
$desc=$_POST["desc"];
$status=$_POST["status"];
$assign=$_POST["assign"];
$res=$_POST["res"];



/* $id="2";
$title="sass";
$desc="sss";
$status="3";
$assign="2";
$res="nothing";*/

$sql = "UPDATE `ticket` SET `Title` = '$title', `description` = '$desc', `status` = '$status', `assigned_to` = '$assign',`Resolution`='$res' WHERE `ticket`.`TID` = '$id';";
$result = mysqli_query($conn,$sql);
$response=array();
if ($result) {
    
    $code="success";
    array_push($response, array("code"=>$code));
   // echo json_encode(array('login'=>$response));
     print_r(json_encode(array('savedata'=>$response)));  }


$conn->close();
?>