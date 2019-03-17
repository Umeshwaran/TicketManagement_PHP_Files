<?php
require 'connect.php';
$name=$_POST["name"];
$pass=$_POST["pass"];
 //$name='Umesh';
//$pass='1234';

$sql = "SELECT * FROM users where Name='$name' and Password='$pass'";
$result = mysqli_query($conn,$sql);
$response=array();

$spin="SELECT * FROM users";
$spinres=mysqli_query($conn,$spin);
    while($r = mysqli_fetch_row($spinres)){
    // $rows[] = $r; has the same effect, without the superfluous data attribute
   // $response[] = array($r);
   $response['users']= mysqli_fetch_all($spinres,MYSQLI_ASSOC);
    //array_push($response[], array('data' => $r));
}
//print_r(json_encode(array('login'=>$response))); 
if (mysqli_num_rows($result)> 0) {
    // output data of each row
    $row = mysqli_fetch_row($result);
    $id=$row[0];
    $name=$row[1];
    $user=$row[3];
    $location=$row[4];
    $contact=$row[5];
    $flag=$row[6];
    $code="login_success";
    array_push($response, array("code"=>$code,"id"=>$id,"name"=>$name,"user"=>$user,"location"=>$location,"contact"=>$contact,"flag"=>$flag));
   // echo json_encode(array('login'=>$response));
     print_r(json_encode(array('login'=>$response)));  
           
}




 else {
    $code="login_failed";
    $message="Check the credentials";
    array_push($response, array("code"=>$code,"message"=>$message));
    print_r(json_encode(array('login'=>$response)));
//    echo json_encode(array('login'=>$response));
}
$conn->close();
?>