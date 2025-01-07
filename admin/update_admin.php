<?php
include "Admin-header.php";
include "database/connection.php";

if(isset($_GET['id']));
    $edit_id = $_GET['id'];

    $query ="SELECT * FROM `admin` WHERE `id` = '$edit_id'";
    $reuslt = mysqli_query($conn, $query);

    if(mysqli_num_rows($reuslt) > 0){
        while($fetch_edit = mysqli_fetch_assoc($reuslt)){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/add_food.css">
</head>
<body>
<script type="text/javascript">
    window.history.forward();
</script>
    
<div class="container">
<section>
<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
<h4>UPDATE ADMIN</h4>
<input type="hidden" name="edit_id" value="<?php echo $fetch_edit['id']; ?>">
<input type="text" name="update_admin_name" placeholder="Admin Name" class="box" value="<?php echo $fetch_edit['admin_name']; ?>" require>
<input type="text" name="update_password" placeholder="Password" class="box" value="<?php echo $fetch_edit['password']; ?>" require>
<input type="submit" value="Update Admin" name="update_admin" class="btn" style="background-color:#FFC609;">
<a href="change_admin.php" style="text-decoration: none;"><input type="" value="Go Back" id="close-edit" class="btn" style="margin:15px; margin-left:0px"></a>
</form>
</section>
</div>
</body>
</html>
  
<?php 
       };
    };

if(isset($_POST['update_admin'])){
    $edit_id = $_POST['edit_id']; 
    $update_admin_name = $_POST['update_admin_name'];
    $update_password = $_POST['update_password'];
    $update_password=md5($update_password);
   
    $query = "UPDATE `admin` SET `admin_name`= '$update_admin_name',`password` = '$update_password' WHERE `id` = '$edit_id'";
    $reuslt = mysqli_query($conn, $query);
    if($reuslt){
        echo '<script>alert("Admin Update Succesfully")</script>';
        echo "<script>window.location.href='change_admin.php';</script>";
} else{
    echo '<script>alert("Admin Update Not Succesfully")</script>';

 }
}
?>


 
