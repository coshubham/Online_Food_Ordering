<?php
include 'PHP/header.php';

$search = $_POST['search'];
?>
 <a href="order_now.php">
        <div class="back-icon"><i class="far fas fa-arrow-left"></i></div>
    </a>
    <h2>Your Favourite Food<span> <b><?php echo $search; ?></b></span></h2>

<?php


$sql = "SELECT *FROM foods WHERE food_name LIKE '%$search%' OR restaurant_name LIKE '%$search%' OR location LIKE '%$search%'";
$res = mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);
if($count > 0)
{
 while($row = mysqli_fetch_assoc($res))
 {
    $id= $row['id'];
    $food_name= $row['food_name'];
    $food_image= $row['food_image'];
    $About_food= $row['About_food'];
    $restaurant_name= $row['restaurant_name'];
    $location= $row['location'];
    $price= $row['price'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h2{
            color:#fff;
            text-align: center;
            font-size: 2rem;
            font-family: sans-serif;
            margin-bottom: -30px;
        }
        span b{
            color: #fe523b;
            font-weight: 900; 
        }
        .back-icon {
            font-size: 30px;
            margin-top: 14px;
            margin-left: 40px;
            padding: 0px 5px;
            color: #fff;
        }

        .back-icon:hover {
            color: #ec4d37;
        }
    </style>
</head>
<body>

 <div class="category">
       <div class="card">
                <form action="manage_cart.php" method="POST">
                    <img src="admin/image/<?php echo $food_image; ?>" alt="">
                    <div class="food-title">
                        <h1><?php echo $food_name; ?></h1>
                    </div>
                    <div class="desc-food">
                       <b> <p><?php echo $About_food; ?><br><br></b>
                            <b>Restaurant Name:-&nbsp;</b><?php echo $restaurant_name; ?><br><br>
                            <b>Location:-&nbsp;</b><?php echo $location; ?><br>
                        </p>
                    </div>
                    <div class="price">
                        <span>Rs.<?php echo $price; ?></span>

                        <input type="submit" class="btn-cart" name="Add_to_cart" value = "Add to cart">
                        <input type="hidden" name="food_name" value="<?php echo $food_name;  ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                    </div>
                </form>        
          </div>
    </div>
</body>
</html>
   



    <?php  
 }
}
else{
    echo '<script>alert("Food Not Found")</script>';
    echo "<script>window.location.href='order_now.php';</script>";
}

?>