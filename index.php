<?php

//This index file initaliazes Database Connection for MySQL in this project.

$database = "HabeshaHorizon";
$host ="localhost:3306/";
$username = "root";
$password ="abdu";

$conn = mysqli_connect($host,  $username, $password,$database);

?>