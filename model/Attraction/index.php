<?php 
include '../../index.php';
global $conn;
$sql = "CREATE TABLE IF NOT EXISTS Attraction(ID int AUTO_INCREMENT PRIMARY KEY, Attname varchar(30), CName varchar(30), title varchar(130), Imagepath varchar(500), Ratting int, Region varchar (30), Constraint fk_Attraction_CName FOREIGN KEY(CName) REFERENCES Category(CName)   )";

mysqli_query($conn, $sql);



function addAttraction($Attname, $Category, $title,$Imagepath,$Ratting, $Region){
    global $conn;

    $add = "INSERT INTO Attraction (Attname, CName, title, Imagepath, Ratting, Region) VALUES('$Attname','$Category', '$title', '$Imagepath', '$Ratting', '$Region')";
 if(mysqli_query($conn, $add)) {
        // If the query was successful, return a success message
        $response['status'] = 'success';
        $response['message'] = 'Attraction added successfully';
        echo json_encode($response);
    } else {
        // If the query failed, return an error message
        $response['status'] = 'error';
        $response['message'] = 'Error adding attraction: ' . mysqli_error($conn);
    }
 


};

function getAllAttraction(){
  global $conn;
  $getAll = "SELECT * FROM Attraction";
  $result = mysqli_query($conn,$getAll);
  $rows = array();
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows,JSON_UNESCAPED_SLASHES);

}

function getAttractionById($id){
    global $conn;
    $getById = "SELECT * FROM Attraction WHERE id = $id";
  $result  =    mysqli_query($conn, $getById);
 if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
echo json_encode($row, JSON_UNESCAPED_SLASHES);
 }else{
  echo "No attraction With this ID found";
 }
}