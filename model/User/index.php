<?php 
include '../../index.php';

global $conn;

$sql = "CREATE TABLE IF NOT EXISTS User(ID int AUTO_INCREMENT PRIMARY KEY, Username VARCHAR(255) NOT NULL, EMAIL VARCHAR(255) NOT NULL, PhotoUrl VARCHAR(255))";

 

function AddUser($Username, $Email, $PhotoUrl){
   global $conn;
  $sql = "INSERT INTO User(Username, EMAIL, PhotoUrl) VALUES('$Username', '$Email', '$PhotoUrl')";
  if(mysqli_query($conn, $sql)){
$response['status'] = '200';
        $response['message'] = 'User added successfully';
        echo json_encode($response);
  }else{
      $response['status'] = '400';
        $response['message'] = 'User Not Added ' ;
  }
 }


 function GetUser($id){
   global $conn;
   $sql = "SELECT * FROM User WHERE ID= $id ";
   $result = mysqli_query($conn, $sql);
   $rows = array();
     while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows,JSON_UNESCAPED_SLASHES);



 }