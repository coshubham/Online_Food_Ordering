<?php
include "database/connection.php";

if(!$conn){
    die("Sorry your connection is Failed:".mysqli_connect_error());
}
else{
    echo "Connection was succesfuly";
}


if(isset($_GET['deleteid'])){
    $id=$_GET["deleteid"];

    $sql = "DELETE FROM admin WHERE id='$id' ";
    $result= mysqli_query($conn,$sql);
    if($result){
        echo '<script>alert("Admin Delete Succesfully")</script>';
        echo "<script>window.location.href='change_admin.php';</script>";
    }
    else{
        die(mysqli_error($conn));
    }
};

?>