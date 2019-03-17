<?php
require 'connect.php';
 $message=$_POST["message"];
$title=$_POST["title"];
$id=$_POST["id"];
$pathtofcm='https://fcm.googleapis.com/fcm/send';
$serverkey="AAAASn1qqYw:APA91bHWbKEV7eUzO-INAn5yiYeCAh-hTp9G6mZyhIrto50PZTPyw_UJTL8siTl9D0OA5uA9z7NkgxEv-u2IBLQrsSqBcB2CRyjL_NSiTld6q_C7VtgAIVzs03cV_N2RICGi-kng17hv";

/* $message='checking for notification';
$title='Paaruda';
$id='1';*/

$sql = "SELECT `users`.`Fcm` FROM `users` WHERE `users`.`ID`='$id';";
$result=mysqli_query($conn,$sql);

if (mysqli_num_rows($result)> 0) {
	
	$row=mysqli_fetch_row($result);
	
$fcm=$row[0];
$code="fcmsuccess";
$R=array();
array_push($R, array("code"=>$code));
 //print_r($fcm);
print_r(json_encode(array('fcmres'=>$R)));
}
$headers=array(
	'Authorization:key=' .$serverkey,
	'Content-Type:application/json'
	);

$fields=array('to'=>$fcm,
	'notification'=>array('title'=>$title,'body'=>$message)
	);

$payload=json_encode($fields);

$curl_session=curl_init();

curl_setopt($curl_session, CURLOPT_URL, $pathtofcm);

curl_setopt($curl_session, CURLOPT_POST, true);

curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);

curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);



$result=curl_exec($curl_session);

curl_close($curl_session);


$conn->close();
?>