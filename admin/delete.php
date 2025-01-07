<?php
include "database/connection.php";

if(!$conn){
    die("Sorry your connection is Failed:".mysqli_connect_error());
}
else{
    echo "Connection was succesfuly";
}


if(isset($_GET['deleteEmail'])){
    $Email=$_GET["deleteEmail"];

    $sql = "DELETE FROM users WHERE Email='$Email' ";
    $result= mysqli_query($conn,$sql);
    if($result){
        header('location:user_list_table.php');
      
    }
    else{
        die(mysqli_error($conn));
    }
};




?>