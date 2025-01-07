<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="CSS/your_order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order</title>
</head>
<body>
<section class="menu">
        <div class="nav">
            <div class="logo">
                <h1>Food<b>Hut</b></h1>
            </div>
            <ul>
                <li><a href="Homepage.php" class="active">Home</a></li>
                <li><a href="order_now.php" class="active">Order Now</a></li>
                <li><a href="your_order.php" class="active">Your Order</a></li>
                <li><a href="Homepage.php#About Us" class="active">About Us</a></li>
                <li><a href="#Contact Us" class="active">Contact US</a></li>
            </ul>
    </section>


<?php
session_start();
include 'PHP/Database/Connection.php';

if (!isset($_SESSION['Email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['Email'];

$sql = "SELECT * FROM orders WHERE email='$userEmail'"; 
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo ' <div class="main">
    <div class="col-lg-12 grid-margin stretch-card p-4">
    <div class="card">
      <div class="card-body">
      <h1 class="card-title" style="font-size:1.4rem; font-family:cooper black; color:#000; text-align: center">Your Orders</h1>
        <p class="card-description">
        </p>
        <div class="table-responsive">
          <table class="table table-bordered table-striped thead-dark">
            <thead  style="font-family:cooper; text-align:center;">
              <tr>
                <th scope="col" style="font-size:1.1rem; color:#ec4d37;">
                Name
                </th>
                <th scope="col" style="font-size:1.1rem; color:#ec4d37;">
                Phone No.
                </th>
                <th scope="col" style="font-size:1.1rem; color:#ec4d37;">
                Delivery Address
                </th>
                <th scope="col" style="font-size:1.1rem; color:#ec4d37;">
                Payment Mode
                </th>
                <th scope="col" style="font-size:1.1rem; color:#ec4d37;">
                Orders
                </th>
                <th scope="col" style="font-size:1.1rem; color:#ec4d37;">
                Remove
                </th>
              </tr>
            </thead>';

    while ($user_fetch = mysqli_fetch_assoc($result)) {
        echo "<tr class='text-center'>";
        echo "<td>{$user_fetch['full_name']}</td>";
        echo "<td>{$user_fetch['phone_no']}</td>";
        echo "<td>{$user_fetch['address']}</td>";
        echo "<td>{$user_fetch['pay_mode']}</td>";

        // Query to fetch individual items for the order
        $order_query = "SELECT * FROM user_order WHERE Order_Id='{$user_fetch['Order_Id']}'";
        $order_result = mysqli_query($conn, $order_query);
        echo "<td><table class='table table-bordered table-striped'>";
        echo "<thead class='thead-dark'><tr><th>Item Name</th><th>Price</th><th>Quantity</th></tr></thead><tbody>";

        while ($order_fetch = mysqli_fetch_assoc($order_result)) {
            echo "<tr>";
            echo "<td>{$order_fetch['Name']}</td>";
            echo "<td>{$order_fetch['Price']}</td>";
            echo "<td>{$order_fetch['Quantity']}</td>";
            echo "</tr>";
        }
        echo "</tbody></table></td>";

        // Remove button
        echo "<td>
                <form method='POST' action='PHP/delete_orders.php'>
                    <input type='hidden' name='order_id' value='{$user_fetch['Order_Id']}' />
                    <button type='submit' class='btn btn-danger'>Delete</button>
                </form>
              </td>";
        echo "</tr>";
    }

    echo "</table></div>";
  
    echo '</div>
    </div>
    </div>
    </div>'; // Closing container
} else {
    echo "<p class='text-center' style='font-size:1.6rem; font-family:cooper black; color:#fff; text-align:center'>You have no orders yet.</p>";
}
include "footer2.php"; 
?>

</body>

</html>
