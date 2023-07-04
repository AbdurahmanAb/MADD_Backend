<?php 

include '../../index.php';
include '../../model/category/index.php';
global $conn;

$request = $_SERVER['REQUEST_METHOD'];

if($request === 'POST'){
  $json = file_get_contents('php://input');
$data = json_decode($json);
$name = $data->CName;
$cdes = $data->CDesc;
$Poster = $data->Cposter;  
AddCategory($name, $cdes, $Poster);
}

?>
