<?php
require 'connect.php';
$id=$_POST["tid"];
 //$id="30";


// $name='User';
// $pass='1234';

$sql = "SELECT * FROM ticket where TID='$id' ";
$result = mysqli_query($conn,$sql);
$response=array();
if (mysqli_num_rows($result)> 0) {
    // output data of each row
    $row = mysqli_fetch_row($result);
    $id=$row[1];
    $title=$row[0];
    $desc=$row[2];
    $created=$row[3];
    $status=$row[4];
    $assigned=$row[7];
$Resolution=$row[8];
    $code="retrieved";
    array_push($response, array("code"=>$code,"id"=>$id,"title"=>$title,"desc"=>$desc,"status"=>$status,"assigned"=>$assigned,"created"=>$created,"res"=>$Resolution));
   // echo json_encode(array('login'=>$response));
     print_r(json_encode(array('getdata'=>$response)));  }


$conn->close();
?>