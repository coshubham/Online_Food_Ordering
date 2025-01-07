<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                <h1 class="card-title" style="font-size:1.4rem; font-family:cooper black; color:#000; text-align: center">Orders List</h1>
                  <p class="card-description">
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead style="font-family:cooper; text-align:center; ">
                        <tr>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                         
                            Order ID
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            Customer Name
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                            Phone No
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          Address
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          Payment Mode
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          Orders
                          </th>
                          <th style="font-size:1.1rem; color:#ec4d37;">
                          Remove
                          </th>
                        </tr>
                      </thead>
                      <?php
        $Sql = "Select * from orders";
        $result = mysqli_query($conn,$Sql);
            while($user_fetch=mysqli_fetch_assoc($result))
            {
              echo "<tr style='font-family:sans-serif; font-weight:bolder;text-align:center;'>
              <td class='py-1'>$user_fetch[Order_Id]</td>
              <td>
              $user_fetch[full_name]
              </td>
              <td>
              $user_fetch[phone_no]
              </td>
              <td>
              $user_fetch[address]
              </td>
              <td>
              $user_fetch[pay_mode]
              </td>
              <td>
              <table class='table table-striped'>
                      <thead style='font-family:sans-serif; font-weight:bolder;text-align:center; '>
                        <tr>
                          <th style='font-size:1.1rem;'>
                            Item Name
                          </th>
                          <th style='font-size:1.1rem;'>
                            Price
                          </th>
                          <th style='font-size:1.1rem;'>
                            Quantity
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      ";
                      $order_query="SELECT * FROM `user_order` WHERE `Order_Id`=' $user_fetch[Order_Id]'";
                      $order_result=mysqli_query($conn,$order_query);
                      while($order_fetch=mysqli_fetch_assoc($order_result))
                      {
                        echo"
                        <tr>
                            <td style='font-family:sans-serif; font-weight:bold; text-align:center; color:#ec4d37;'>$order_fetch[Name]</td>
                            <td style='font-family:sans-serif; font-weight:bold; text-align:center; color:#ec4d37;'>$order_fetch[Price]</td>
                            <td style='font-family:sans-serif; font-weight:bold; text-align:center; color:#ec4d37;'>$order_fetch[Quantity]</td>
                        </tr>
                        ";
                      }

                      echo"
                          </tbody>
                         </table>
                        </td>
                        <td>
                        
                        <form method='POST' action='delete_orders.php'>
                          <input type='hidden' name='order_id' value='$user_fetch[Order_Id]' />
                          <button type='submit'style='height:30px; width:5.7rem; text-align:center; font-family:cooper; font-size:17px; color:Whitesmoke; background-color:#ec4d37; border:none; border-radius:5px;'>Delete</button>
                        </form>
                      </td>
                        
                    </tr>
                      ";
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