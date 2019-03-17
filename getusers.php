<?php
require 'connect.php';


$sql = "SELECT * FROM users ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$data[]=$row;
	}
	echo json_encode($data);
?>