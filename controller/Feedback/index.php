<?php 

include '../../model/Feedback/index.php';

$request = $_SERVER['REQUEST_METHOD'];

if($request ==='POST'){
  $json_data = file_get_contents('php://input');
        $data = json_decode($json_data);
  

$AttractionID = $data->AttractionID;
$UserId = $data-> UserId;
$comment = $data-> comment;
$ratting= $data->ratting;
    addFeedback($AttractionID, $UserId, $comment, $ratting);
}else if($request === 'GET'){
    $json_data= file_get_contents('php://input');
    $data = json_decode($json_data);
    $id = $data -> id;
    getFeedback($id);
}