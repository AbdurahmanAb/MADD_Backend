<?php

include '../../index.php';
include '../../model/News/index.php';
global $conn;

$request = $_SERVER['REQUEST_METHOD'];
if($request == 'GET'){

GetNews();
}


