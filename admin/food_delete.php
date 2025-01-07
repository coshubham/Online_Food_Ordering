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

    $sql = "DELETE FROM foods WHERE id='$id' ";
    $result= mysqli_query($conn,$sql);
    if($result){
        echo '<script>alert("Food Delete Succesfully")</script>';
        echo "<script>window.location.href='add_food.php';</script>";
    }
    else{
        die(mysqli_error($conn));
    }
};

?>