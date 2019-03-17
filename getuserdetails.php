<?php
require 'connect.php';
$id=$_POST["uid"];
//$id='2';

// $name='User';
// $pass='1234';

$sql = "SELECT * FROM users where ID='$id' ";
$result = mysqli_query($conn,$sql);
$response=array();
if (mysqli_num_rows($result)> 0) {
    // output data of each row
    $row = mysqli_fetch_row($result);
    $name=$row[1];
    $ucode=$row[3];
    $loc=$row[4];
    $contact=$row[5];
    $code="retrieved";
    array_push($response, array("code"=>$code,"name"=>$name,"ucode"=>$ucode,"loc"=>$loc,"contact"=>$contact));
   // echo json_encode(array('login'=>$response));
     print_r(json_encode(array('getdetails'=>$response)));  }


$conn->close();
?>