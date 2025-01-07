<?php
include ("PHP/Database/Connection.php"); 
session_start();
if(!isset($_SESSION['Email'])){
    header("location: index.php");
 }
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
    <div id="preloader"></div>
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
                <li><a href="Homepage.php#Contact Us" class="active">Contact US</a></li>
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
    <form action="search.php" method="POST">
    <div class="search-bar">
        <div class="search_wrap search_wrap">
            <div class="search_box">
                <input type="text" class="input" name="search" placeholder="search Your Favorite Food..." require>
                <button type="submit" class="btn btn_common" style="border:none;" name="subimt"><i class="fas fa-search"></i></button>
            </form>
            </div>
        </div>
    </div>

   <?php
include 'PHP/Database/Connection.php';
$select_foods = mysqli_query($conn,"SELECT * FROM `foods`");
if(mysqli_num_rows($select_foods) > 0){
    while($fetch_food = mysqli_fetch_assoc($select_foods)){
?>
    <div class="category">
                <div class="card">
                <form action="manage_cart.php" method="POST">
                <img src="admin/image/<?php echo $fetch_food['food_image']; ?>" alt="">
                    <div class="food-title">
                        <h1><?php echo $fetch_food['food_name']; ?></h1>      
                    </div>
                    <div class="desc-food">
                       <b> <p><?php echo $fetch_food['About_food']; ?><br><br></b>
                            <b>Restaurant Name:-&nbsp;</b><?php echo $fetch_food['restaurant_name']; ?><br><br>
                            <b>Location:-&nbsp;</b><?php echo $fetch_food['location']; ?><br>
                        </p>
                    </div>
                    <div class="price">
                    <span>Rs.<?php echo $fetch_food['price']; ?></span>
                   
                        <input type="submit" class="btn-cart" name="Add_to_cart" value = "Add to cart">
                        <input type="hidden" name="food_name" value="<?php echo $fetch_food['food_name']; ?>">
                        <input type="hidden" name="price" value="<?php echo $fetch_food['price']; ?>">
                    </div>
                </form>
            </div>
    </div>
   
    
    <script src="JS/main.js"></script>
    <script src="JS/jquery-3.6.0.js"></script>

    <?php  
};
};
    ?>
    
</body>

</html>