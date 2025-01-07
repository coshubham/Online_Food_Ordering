<?php
include ("PHP/Database/Connection.php"); 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <meta http-equiv="refresh" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/order_now.css">
    <title>Order Now</title>
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
                <li><a href="your_order.html" class="active">Your Order</a></li>
                <li><a href="#" class="active">About Us</a></li>
            </ul>
            <?php
            $count=0;
            if(isset($_SESSION['cart']))
            {
                $count=count($_SESSION['cart']);
            }
            ?>
            <div class="icon">
                <a href="cart.php"><span><i class="fas fa-cart-plus"></i></a>
                <span class="quantity"><?php echo $count; ?></span>
                <a href="PHP/logout.php"><input class="signup" type="submit" value="Logout" name="Logout" style="font-size:15px; padding:10px; margin:6px; cursor: pointer; border-radius:50px; font-weight:900;"></a>
            </div>
        </div>
    </section>
</body>

</html>