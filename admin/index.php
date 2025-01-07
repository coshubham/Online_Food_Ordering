<?php
include "database/connection.php";

if(isset($_POST['login']))
{
  $admin_name=$_POST['admin_name'];
  $password=$_POST['password'];
  $password=md5($password);
  $query="SELECT * FROM `admin` WHERE admin_name='$admin_name' and password='$password'";
  $result=mysqli_query($conn,$query);
  if(mysqli_num_rows($result)==1)
  {
       session_start();
       $_SESSION['admin_name']=$_POST['admin_name'];
       header("location: Admin-panel.php");
  }else{
    echo"<script>alert('Incorrect Username or Password Please check');</script>";
    // header("location: index.php");
  }
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
  <title>Admin Page</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="shortcut icon" href="images/icon.png" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg" style="background-color:#ffeae0;">
        <div class="row flex-grow" style="margin-top:20px;">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-2">
              <div class="brand-logo">
                <a href="../index.php"><img src="images/icon.png" style="margin-left:3rem;"></a>
              </div>
              <h4 style="font-family:cooper; font-size:1.5rem; color:#333; text-align: center; padding:10px;">&#128587;Welcome back&#128587;</h4>
              <h4 class="font-weight-light" style="font-family:cooper; font-size:1.3rem; color:#333; text-align: center;">&#128525;Happy to see you again&#128516;</h4>
              <form class="pt-4" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail" style="font-family:cooper; font-size:1.1rem;">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                      <img src="images/gif/user1.gif" alt="" style="height:25px; width:25px; border-radius: 200px;"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" style="font-family:cooper; font-size:1.1rem;" name="admin_name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword"  style="font-family:cooper; font-size:1.1rem;">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                      <img src="images/gif/key.gif" alt="" style="height:25px; width:25px; border-radius: 200px;"></i>

                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password"  style="font-family:cooper; font-size:1.1rem;" name="password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      
                    </label>
                  </div>
                </div>
                
                <div class="mb-2 d-flex" style="position:relative; top:-3rem; left:4.6rem;">
                  <button type="submit" class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn" style="font-family:cooper; font-size:1rem; color:#fff;" name="login">LOGIN</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->

</body>

</html>
