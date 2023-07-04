<?php 

include '../../index.php';
global $conn;

$sql = "CREATE TABLE IF NOT EXISTS Category(CName VARCHAR(255) PRIMARY KEY, CDesc TEXT, PosterImg VARCHAR(500))";
if(mysqli_query($conn, $sql)){
 echo  "Table CREATED SUCCESSFULLY";
}
function AddCategory($CName, $CDesc, $PosterImg){
global $conn;
$add = "INSERT INTO Category(CName, CDesc,PosterImg) VALUES('$CName', '$CDesc', '$PosterImg')";
if(mysqli_query($conn, $add)){
    $response["status"] = '200';
    $response['Message']='Responded Successfully';
    echo json_encode($response);
}
};

function GetCategory($id){
    global $conn;
    $add = "SELECT * FROM Category WHERE ID ='$id'";


}

?>