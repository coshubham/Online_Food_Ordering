<?php

// Created connection to Database

$host="localhost";
$user="root";
$pass="";
$db="foodhut";

$conn =new mysqli($host,$user,$pass,$db);

if($conn->connect_error){
    echo "Sorry shubham Your Database not connected Plase Check Once:".$conn->connect_error;
} 
// else{
//     echo "Connection is Completed.";
// }
?>
