<?php
include "Admin-header.php";
include "database/connection.php";

if(isset($_GET['id']));
    $edit_id = $_GET['id'];

    $query ="SELECT * FROM `foods` WHERE `id` = '$edit_id'";
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
<h4>UPDATE FOODS</h4>
<img src="image/<?php echo $fetch_edit['food_image']; ?>" height="100" weight="100" alt="" style="border-radius:300px;">
<input type="hidden" name="edit_id" value="<?php echo $fetch_edit['id']; ?>">
<input type="text" name="update_food_name" placeholder="Enter the Food Name" class="box" value="<?php echo $fetch_edit['food_name']; ?>" style="margin-left:60px" require>
<input type="file" name="update_food_image" accept="image/png, image/jpeg" class="img" value="<?php echo $fetch_edit['food_image']; ?>" require>
<input type="text" name="update_About_food" placeholder="Enter the Food Detail" class="box" value="<?php echo $fetch_edit['About_food']; ?>" require>
<input type="text" name="update_restaurant_name" placeholder="Enter the Restaurant Name" class="box" value="<?php echo $fetch_edit['restaurant_name']; ?>" require>
<input type="text" name="update_location" placeholder="Enter the location" class="box" value="<?php echo $fetch_edit['location']; ?>" require>
<input type="number" name="update_price" placeholder="Enter the Price" value="<?php echo $fetch_edit['price'];  ?>" class="box" require>
<input type="submit" value="Update Foods" name="update_food" class="btn" style="background-color:#FFC609;">
<a href="add_food.php" style="text-decoration: none;"><input type="" value="Go Back" id="close-edit" class="btn" style="margin:15px; margin-left:0px"></a>
</form>
</section>
</div>
</body>
</html>
  
<?php 
       };
    };

if(isset($_POST['update_food'])){
    $edit_id = $_POST['edit_id']; 
    $update_food_name = $_POST['update_food_name'];
    $update_food_image = $_FILES['update_food_image']['name'];
    $update_tempname = $_FILES['update_food_image']['tmp_name'];
    $update_folder = 'image/'.$update_food_image;
    $update_About_food = $_POST['update_About_food'];
    $update_restaurant_name = $_POST['update_restaurant_name'];
    $update_location = $_POST['update_location'];
    $update_price = $_POST['update_price'];
   
    $query = "UPDATE `foods` SET `food_name`= '$update_food_name',`food_image` = '$update_food_image',`About_food` = '$update_About_food',`restaurant_name` = '$update_restaurant_name',`location` = '$update_location',`price` = '$update_price' WHERE `id` = '$edit_id'";
    $reuslt = mysqli_query($conn, $query);
    if($reuslt){
        move_uploaded_file($update_tempname,  $update_folder);
        echo '<script>alert("Food Add Succesfully")</script>';
        echo "<script>window.location.href='add_food.php';</script>";
} else{
    echo '<script>alert("Food Not Add Succesfully")</script>';

 }
}
?>


 
