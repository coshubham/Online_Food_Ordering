<?php
include "database/connection.php";
 session_start();
 if(!isset($_SESSION['admin_name'])){
    header("location: index.php");
 }

 if(isset($_POST['logout'])){
  session_destroy();
  header("location:index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript">
    window.history.forward();
</script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DASHBOARD</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/icon.png" />
</head>
<body>

    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" >
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="	background-image: linear-gradient(45deg, #ffeae0, #fff, #ffeae0);">
        <a class="navbar-brand brand-logo " href="../index.php"><img src="images/icon.png" alt="logo" style="height:3.2rem; width:3.2rem;"><p style="font-size:1.4rem;display:inline; font-family:cooper black; color:#924936; margin-left:15px;">Admin Panel</p></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end" style="	background-image: linear-gradient(45deg, #ffeae0, #fff, #ffeae0);">
      <a class="nav-link" href="change_admin.php">
              <img src="images/gif/user1.gif" alt="" style="height:30px; width:30px; border-radius: 200px; margin-left:-1px;"></i>
              <span class="menu-title"style="margin-left:10px; color:#000;  font-family:sans-serif; "><b>Admin</b></span>
            </a>
                     
            </div>
          </li>
        </ul>
       
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="	background-image: linear-gradient(45deg, #ffeae0, #fff, #ffeae0);">
      <form method="POST">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="Admin-panel.php">
            <img src="images/gif/Dashborad.gif" alt="" style="height:40px; width:40px; border-radius: 200px; margin-left:-10px;"></i>
              <span class="menu-title" style="margin-left:12px; color:#000;"><b>Dashboard</b></span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="user_list_table.php">
            <img src="images/gif/users.gif" alt="" style="height:43px; width:43px; border-radius: 200px; margin-left:-10px;"></i>
              <span class="menu-title"style="margin-left:12px; color:#000;"><b>Users</b></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="add_food.php">
              <img src="images/gif/add_food2.gif" alt="" style="height:45px; width:45px; border-radius: 200px; margin-left:-10px;"></i>
              <span class="menu-title"style="margin-left:12px; color:#000;"><b>Add Foods</b></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Contact Us.php">
              <img src="images/gif/order.gif" alt="" style="height:47px; width:47px; border-radius: 200px; margin-left:-5px;"></i>
              <span class="menu-title"style="margin-left:12px; color:#000;"><b>Orders</b></span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="Contact Us.php">
              <img src="images/gif/contact.gif" alt="" style="height:28px; width:28px; border-radius: 200px; margin-left:-1px"></i>
              <span class="menu-title"style="margin-left:20px; color:#000;"><b>Contact Us</b></span>
            </a>
          </li>
             
            <li class="nav-item">
            <a class="nav-link">
            <img src="images/gif/logout.gif" alt="" style="height:36px; width:36px; border-radius: 200px; margin-left:-5px;"></i>
              <button class="menu-title" style="margin-left:12px; border:none; background:none; color:#000;" name="logout"><b>Logout</b></button>
            </a>
            
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">

              </ul>
            </div>
          </li>
          
        </ul>
        </form>
      </nav>

       <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="	background-image: linear-gradient(-165deg, #ffeae0, #fff, #ffeae0);" >
        <!-- style="	background-image: linear-gradient(196deg, #f2c5ff, #6cd0ff);" -->
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0" style="font-size:1.7rem; font-family:cooper black;">DASHBOARD</h4>
                </div>
                <div>
                   
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 grid-margin stretch-card" style="">
            <div class="card" style="background:#fff; border-radius:60px; border: 3px solid #ffeae0">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left" style="font-family:cooper black; font-size:1.2rem; color:#000;">Users</p>
                  <?php
                  $dash_user_query ="SELECT * FROM users";
                  $dash_user_query_run=mysqli_query($conn, $dash_user_query);
                  if($user_total = mysqli_num_rows($dash_user_query_run))
                  {
                     echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">'.$user_total.'</h3>';
                  }else{
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">0</h3>';
                  }

                  ?>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    
                   <a href="user_list_table.php"><img src="images/gif/user.gif" style="color:#fff; margin-left:2.6rem; position:relative; top:-2.2rem; height:66px; width:80px; text-decoration:none; border-radius:400px;"></i></a>
                  </div>             
                  
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="background:#fff; border-radius:60px; border: 3px solid #ffeae0">
                <div class="card-body"><a href="add_food.php" style="text-decoration:none;">
                  <p class="card-title text-md-center text-xl-left" style="font-family:cooper black; font-size:1.2rem; color:#000;">Foods</p>
                  <?php
                  $dash_user_query ="SELECT * FROM foods";
                  $dash_user_query_run=mysqli_query($conn, $dash_user_query);
                  if($foods_total = mysqli_num_rows($dash_user_query_run))
                  {
                     echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">'.$foods_total.'</h3>';
                  }else{
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">0</h3>';
                  }

                  ?>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    
                  <a href="add_food.php"><img src="images/gif/foods_list.gif" style="color:#fff; margin-left:-7rem; position:relative; top:-2.2rem; height:66px; width:80px; text-decoration:none; border-radius:400px;"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="background:#fff; border-radius:60px; border: 3px solid #ffeae0">
                <div class="card-body"><a href="add_food.php" style="text-decoration:none;">
                  <p class="card-title text-md-center text-xl-left" style="font-family:cooper black; font-size:1.2rem; color:#000;">Orders</p>
                  <?php
                  $dash_user_query ="SELECT * FROM orders";
                  $dash_user_query_run=mysqli_query($conn, $dash_user_query);
                  if($orders_total = mysqli_num_rows($dash_user_query_run))
                  {
                     echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">'.$orders_total.'</h3>';
                  }else{
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">0</h3>';
                  }

                  ?>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    
                  <a href="orders.php"><img src="images/gif/order2.gif" style="color:#fff; margin-left:-7.5rem; position:relative; top:-2.2rem; height:66px; width:80px; text-decoration:none; border-radius:400px;"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="background:#fff; border-radius:60px; border: 3px solid #ffeae0">
                <div class="card-body"><a href="add_food.php" style="text-decoration:none;">
                  <p class="card-title text-md-center text-xl-left" style="font-family:cooper black; font-size:1.2rem; color:#000;">Contact Us</p>
                  <?php
                  $dash_user_query ="SELECT * FROM contact";
                  $dash_user_query_run=mysqli_query($conn, $dash_user_query);
                  if($contact_total = mysqli_num_rows($dash_user_query_run))
                  {
                     echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">'.$contact_total.'</h3>';
                  }else{
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">0</h3>';
                  }

                  ?>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    
                  <a href="Contact Us.php"><img src="images/gif/contact.gif" style="color:#fff; margin-left:-7rem; position:relative; top:-2.2rem; height:50px; width:60px; text-decoration:none; border-radius:400px;"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
            <div class="card" style="background:#fff; border-radius:60px; border: 3px solid #ffeae0">
                <div class="card-body"><a href="change_admin.php" style="text-decoration:none;">
                  <p class="card-title text-md-center text-xl-left" style="font-family:cooper black; font-size:1.2rem; color:#000;">Admins</p>
                  <?php
                  $dash_user_query ="SELECT * FROM admin";
                  $dash_user_query_run=mysqli_query($conn, $dash_user_query);
                  if($admin_total = mysqli_num_rows($dash_user_query_run))
                  {
                     echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">'.$admin_total.'</h3>';
                  }else{
                    echo '<h3 class="mb-0 mb-md-2 mb-xl-0 order-md-1 order-xl-0" style="font-family:cooper; color:#000; text-align:center; position:relative; top:4.4rem;">0</h3>';
                  }

                  ?>
                  <div class="d-flex flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    
                  <a href="change_admin.php"><img src="images/gif/user1.gif" style="color:#fff; margin-left:-8rem; position:relative; top:-2.2rem; height:66px; width:80px; text-decoration:none; border-radius:400px;"></i></a>
                  </div>
                </div>
              </div>
            </div>


           
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->

</body>

</html>

