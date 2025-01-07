<?php
include "Admin-header.php";
include "database/connection.php";

if(isset($_POST['add_admin'])){
    $admin_name=$_POST['admin_name'];
    $password=$_POST['password'];
    $password=md5($password);

    $insert_query = mysqli_query($conn,"INSERT INTO `admin`(admin_name, password) VALUES 
    ('$admin_name','$password')") or die('query failed');

    if($insert_query){
        echo '<script>alert("New Admin Add Succesfully")</script>';
} else{
    echo '<script>alert("Admin Not Add Succesfully")</script>';

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/add_food.css">

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
<h4>ADD NEW ADMIN</h4>
<input type="text" name="admin_name" placeholder="Admin Name" class="box" required>
<input type="text" name="password" min="0" placeholder="Password" class="box" required>
<input type="submit" value="Add New Admin" name="add_admin" class="btn">
</form>
</section>
</div>
                <div class="card-body">
                  <h1 class="card-title" style="font-size:1.4rem; font-family:cooper black; color:#000; text-align: center">Admin List</h1>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">           
                    <table class="table table-striped">
                      <thead style="font-family:cooper; text-align:center;">
                        <tr>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          ID
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          &nbsp;&nbsp;
                          Admin Name
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            Password
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;"></th>
                        </tr>
                      </thead>
                      <?php
        $Sql = "Select * from admin";
        $result = mysqli_query($conn,$Sql);

        if($result){

         /* $row=mysqli_fetch_assoc($result);
            echo $row ['name'];*/
            while($row=mysqli_fetch_assoc($result))
            {
              $id= $row['id'];
              $admin_name= $row['admin_name'];
              $password= $row['password'];

              echo '<tr style="font-family:sans-serif; font-weight:bolder;text-align:center;">
              <td>
                  '.$id.' 
              </td>
              <td>
              '.$admin_name.'
              </td>
              <td>
                '.$password.'
              </td>
          
              <td>
              <button type="button" class="btn btn-warning" style="height:35px; width:5.8rem; text-align:center; margin-left:30px;"><a href="update_admin.php?id='.$id.'" class="text-light" style="text-decoration:none; font-size:1.3rem; font-family:cooper; position:relative; top:-0.6rem; left:-1rem;">Update</a></button>
              <button type="button" class="btn btn-danger" style="height:35px; width:5.8rem; text-align:center; margin-left:30px;"><a href="admin_delete.php?deleteid='.$id.'" class="text-light" style="text-decoration:none; font-size:1.3rem; font-family:cooper; position:relative; top:-0.6rem; left:-0.7rem;">Delete</a></button>
              </td>
            </tr>';
            }
          }
?>
</body>
</html>