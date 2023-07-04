<?php
include '../../model/Attraction/index.php';

$request = $_SERVER['REQUEST_METHOD'];


if($request === 'GET'){
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data);
    $id = $data->id;
 if($id){

   getAttractionById($id);
 }else{
    getAllAttraction();
 }
}
else if($request === 'POST'){
    $json_data = file_get_contents('php://input');
        $data = json_decode($json_data);

   $Attname = $data->Attname;
   $category = $data->category;
    $title= $data->Title;
    $ImagePath = $data->ImagePath;
    $ratting = $data->ratting;
    $region = $data->Region;        
    addAttraction($Attname,$category, $title, $ImagePath,$ratting,$region);

}

// addAttraction(4,"Natural","Ertale","http://en.localhost", 2,"Afar");

// getAttractionById(4);