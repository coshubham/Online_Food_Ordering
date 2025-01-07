<?php
include "Admin-header.php";
include "database/connection.php";

if(isset($_POST['add_food'])){
    $food_name = $_POST['food_name'];
    $food_image = $_FILES['food_image']['name'];
    $tempname = $_FILES['food_image']['tmp_name'];
    $folder = 'image/'.$food_image;
    $About_food = $_POST['About_food'];
    $restaurant_name = $_POST['restaurant_name'];
    $location = $_POST['location'];
    $price = $_POST['price'];

    $insert_query = mysqli_query($conn,"INSERT INTO `foods`(food_name, food_image, About_food, restaurant_name, location, price) VALUES 
    ('$food_name','$food_image','$About_food','$restaurant_name','$location','$price')") or die('query failed');

    if($insert_query){
        move_uploaded_file($tempname,  $folder);
        echo '<script>alert("Food Add Succesfully")</script>';
} else{
    echo '<script>alert("Food Not Add Succesfully")</script>';

}


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" />
    <link rel="stylesheet" href="css/add_food.css">
    <title>ADD FOODS</title>
</head>
<body>
<script type="text/javascript">
    window.history.forward();
</script>
<div class="col-lg-10 grid-margin stretch-card">
              <div class="card">

              <div class="container">
<section>
<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
<h4>ADD NEW FOODS</h4>
<input type="text" name="food_name" placeholder="Enter the Food Name" class="box" required>
<input type="file" name="food_image" accept="image/png, image/jpeg" class="img" required>
<input type="text" name="About_food" placeholder="Enter the Food Detail" class="box" required>
<input type="text" name="restaurant_name" placeholder="Enter the Restaurant Name" class="box" required>
<input type="text" name="location" placeholder="Enter the location" class="box" required>
<input type="number" name="price" min="0" placeholder="Enter the Price" class="box" required>
<input type="submit" value="Add the Foods" name="add_food" class="btn">
</form>
</section>
</div>
                <div class="card-body">
                  <h1 class="card-title" style="font-size:1.4rem; font-family:cooper black; color:#000; text-align: center">Food List</h1>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">           
                    <table class="table table-striped">
                      <thead style="font-family:cooper; text-align:center;">
                        <tr>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          Food Name
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          &nbsp;&nbsp;
                          Images
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            About Food
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          Restaurant Name
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          &nbsp;&nbsp;
                          Location
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          &nbsp;&nbsp;
                            Price
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;"></th>
                        </tr>
                      </thead>
                      <?php
        $Sql = "Select * from foods";
        $result = mysqli_query($conn,$Sql);

        if($result){

         /* $row=mysqli_fetch_assoc($result);
            echo $row ['name'];*/
            while($row=mysqli_fetch_assoc($result))
            {
              $id= $row['id'];
              $food_name= $row['food_name'];
              $food_image= $row['food_image'];
              $About_food= $row['About_food'];
              $restaurant_name= $row['restaurant_name'];
              $location= $row['location'];
              $price= $row['price'];

              echo '<tr style="font-family:sans-serif; font-weight:bolder;text-align:center;">
              <td>
                  '.$food_name.' 
              </td>
              <td><img src="image/'.$food_image.'" style="height:60px; width:90px;">
              </td>
              <td>
              '.$About_food.'
              </td>
              <td>
                '.$restaurant_name.'
              </td>
              <td>
              '.$location.'
              </td>
              <td>
              '.$price.'
              </td>
          
              <td>
             
              <button type="button" class="btn btn-warning" style="height:35px; width:5.8rem; text-align:center; margin-left:30px;"><a href="update_food.php?id='.$id.'" class="text-light" style="text-decoration:none; font-size:1.3rem; font-family:cooper; position:relative; top:-0.6rem; left:-1rem;">Update</a></button>
              <button type="button" class="btn btn-danger" style="height:35px; width:5.8rem; text-align:center; margin-left:30px;"><a href="food_delete.php?deleteid='.$id.'" class="text-light" style="text-decoration:none; font-size:1.3rem; font-family:cooper; position:relative; top:-0.6rem; left:-0.7rem;">Delete</a></button>

              </td>
            </tr>';
            }
          }
?>
                   
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page--> 
</body>
</html>