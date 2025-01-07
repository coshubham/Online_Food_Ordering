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
              <span class="menu-title"style="margin-left:10px; color:#000;  font-family:sans-serif "><b>Admin</b></span>
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
            <a class="nav-link" href="orders.php">
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

