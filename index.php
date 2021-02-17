<?php
// include 'index_connection.php';
$connection = mysqli_connect('localhost','root','','mit_chat_system');


if($connection){
echo"ok";

}

$json = file_get_contents('php://input');

$data = json_decode($json);
$uaername  = $data->username;
$password  = $data->pass;

$insert_query = "INSERT INTO `user_accounts`(username,user_password)VALUES('$uaername','$password')";

$reslut = mysqli_query($connection,$insert_query);
$selectQurey = "SELECT *FROM `user_accounts`";
$reslut1 = mysqli_query($connection,$selectQurey);
$user_data =[];
    if($reslut){
        while ($row = mysqli_fetch_object($reslut1)) {
          $user_data[] = $row;  
        }
    }
    echo json_encode(["result"=>$user_data]);


?>