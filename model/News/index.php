<?php

include '../../index.php';

global $conn;


function GetNews(){
     global $conn;
 $get = "SELECT * FROM News";
 $result = mysqli_query($conn,$get);
   $rows = array();
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    echo json_encode($rows,JSON_UNESCAPED_SLASHES);
}