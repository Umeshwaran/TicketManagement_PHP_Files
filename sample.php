<?php
require 'connect.php';


$sql = "SELECT * FROM ticket ";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$data[]=$row;
	}
	echo json_encode($data);
?>