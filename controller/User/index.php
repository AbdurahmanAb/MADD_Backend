<?php

include '../../index.php';
include '../../model/User/index.php';


global $conn;


$request = $_SERVER['REQUEST_METHOD'];

if($request === 'POST'){
   $json_data = file_get_contents('php://input');
$data = json_decode($json_data);
$Username = $data->Username;
$email = $data->email;
$PhotoUrl = $data->PhotoUrl;
    AddUser($Username,$email, $PhotoUrl);

}else if($request === 'GET'){
    $json =  file_get_contents('php://input');
    $data = json_decode($json);
    $id = $data->id;

    
    GetUser($id);
}else{
    $response['status'] = '403';
    $response['message'] ='Method Not Found';
    echo $response;
}

?>