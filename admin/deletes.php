<?php
include "database/connection.php";

if(!$conn){
    die("Sorry your connection is Failed:".mysqli_connect_error());
}
else{
    echo "Connection was succesfuly";
}


if(isset($_GET['deleteemail'])){
    $email=$_GET["deleteemail"];

    $sql = "DELETE FROM contact WHERE email='$email' ";
    $result= mysqli_query($conn,$sql);
    if($result){
        echo "<script>
        alert('Successfull deleted');
        window.location.href='Contact Us.php';
        </script>";
      
    }
    else{
        die(mysqli_error($conn));
    }
};




?>