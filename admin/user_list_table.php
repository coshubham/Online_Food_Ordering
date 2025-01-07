<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="8">
  <link rel="shortcut icon" href="images/icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Tables</title>
</head>
<body>
<?php
include "Admin-header.php";
include "database/connection.php";
?>
<body>
            <div class="col-lg-10 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title" style="font-size:1.4rem; font-family:cooper black; color:#000; text-align: center">Users List</h1>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="font-family:cooper; text-align:center;">
                        <tr>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            User Name
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          &nbsp;&nbsp;
                            Email
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            Phone Number
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            Delivery Address
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            Remove Users</th>
                        </tr>
                      </thead>
                      <?php
        $Sql = "Select * from users";
        $result = mysqli_query($conn,$Sql);

        if($result){

         /* $row=mysqli_fetch_assoc($result);
            echo $row ['name'];*/
            while($row=mysqli_fetch_assoc($result))
            {
              
              $first_name= $row['first_name'];
              $last_name= $row['last_name'];
              $Email= $row['Email'];
              $phone_number= $row['phone_number'];
              $delivery_address= $row['delivery_address'];

              echo '<tr style="font-family:sans-serif; font-weight:bolder;text-align:center;">
              <td>
                  '.$row['first_name'] ." ". $row['last_name'].' 
              </td>
              <td>
               '.$Email.'
              </td>
              <td>
              '.$phone_number.'
              </td>
              <td>
                '.$delivery_address.'
              </td>

              <td>
             
              <button type="button" class="btn btn-danger" style="height:30px; width:5.7rem; text-align:center;"><a href="delete.php?deleteEmail='.$Email.'" class="text-light" style="text-decoration:none; font-size:1.1rem; font-family:cooper; position:relative; top:-0.6rem; left:-0.9rem ">Remove</a></button>
          
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