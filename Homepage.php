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
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CSS/footer.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering</title>
</head>

<body>
    <div id="preloader"></div>
    <section class="menu" id="home">
        <div class="nav">
            <div class="logo">
                <h1>Food<b>Hut</b></h1>
            </div>
            <ul>
                <li><a href="Homepage.php" class="active">Home</a></li>
                <li><a href="order_now.php" class="active">Order Now</a></li>
                <li><a href="your_order.php" class="active">Your Order</a></li>
                <li><a href="#About Us" class="active">About Us</a></li>
                <li><a href="#Contact Us" class="active">Contact US</a></li>
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
                <a href="PHP/logout.php"><input class="signup" type="submit" value="Logout" name="Logout"></a>
            </div>
        </div>
    </section>
    <div class="username">
    <h1>Welcome <b><?php
        if(isset($_SESSION['Email'])){
            $Email=$_SESSION['Email'];
            $query=mysqli_query($conn,"SELECT users.* FROM `users` WHERE users.Email='$Email'");
            while($row=mysqli_fetch_array($query)){
                echo $row['first_name'].' '.$row['last_name'];
            }
        }
        ?></b></h1>
        
    </div>
    <section class="grid">
        <div class="content">
            <div class="content-left">
                <div class="info">
                    <h2>Order Your Favorite<br>Food anytime</h2>
                    <p>Hey, Our delicious foods is wating for you,<br>
                        We are always near to you with fresh item of foods</p>
                </div>
                <a href="order_now.php"><button>Order Food</button></a>
            </div>
            <div class="content-right">
                <img src="images/goodies.png" alt="">
            </div>
        </div>
    </section>
    <section class="category" id="About Us">
            <h3>About Us</h3>
            <div class="content">
        <div class="content-left">
            <div class="about_us" >
                <p>Welcome to Food Ordering – your one-stop solution for all your food cravings! We are here to bring the delicious world of food right to your doorstep. Whether you're in the mood for a quick snack, a hearty meal, or something special, our platform allows you to easily browse through a wide variety of cuisines and order your favorites from local restaurants.
                   At Food Ordering, we believe that great food should be simple to enjoy. That's why we’ve designed an easy-to-use website that lets you explore numerous options, customize your order, and have it delivered to your home with just a few clicks. From fast food to gourmet dishes, we’ve got something to satisfy every taste and preference.
                   Our goal is to make your dining experience as convenient and enjoyable as possible, whether you’re ordering for a family meal, a party, or a solo treat. We work with trusted local restaurants to ensure you get fresh, high-quality meals delivered promptly.</p>
                   <a href="order_now.php"><button style="margin-top:20px;">Order Food</button></a>
            </div>
             </div>
            <div class="content-right">
                <img src="images/indian_thali2.png" alt="">
        </div>
        
    </section>

    <?php
include ("PHP/Database/Connection.php"); 

if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $message=$_POST['message'];

  //insert query
  $sql = "INSERT INTO contact (email, message)
  VALUE ('$email','$message')";

   //execute query
   $result=mysqli_query($conn,$sql);

   //we will check
   if($result){
       echo '<script>alert("Your Message Send to Admin")</script>';

   }
   else{
       die(mysqli_error($conn));
   }
}
if(!$conn){
  die("Sorry your connection is Failed:".mysqli_connect_error());
}
else{
  // echo "Connection was succesfuly";
}

?>
<script>
  window.watsonAssistantChatOptions = {
    integrationID: "78067628-5b22-4670-9da3-63f8c5a411a7", // The ID of this integration.
    region: "au-syd", // The region your integration is hosted in.
    serviceInstanceID: "6c25341d-6bc0-4dc9-ae75-02344c09dbb6", // The ID of your service instance.
    onLoad: async (instance) => { await instance.render(); }
  };
  setTimeout(function(){
    const t=document.createElement('script');
    t.src="https://web-chat.global.assistant.watson.appdomain.cloud/versions/" + (window.watsonAssistantChatOptions.clientVersion || 'latest') + "/WatsonAssistantChatEntry.js";
    document.head.appendChild(t);
  });
</script>
    <footer>
        <div class="container">
            <div class="row">

                <!-- 2nd Column -->
                <div class="footer-col">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#About Us">About Us</a></li>
                        <li><a href="#Contact Us">Contact Us</a></li>
                        <li><a href="order_now.php">Order Now</a></li>
                        <li><a href="cart.php">Add to cart</a></li>
                        <li><a href="your_order.php">Your Orders</a></li>
                        <li><a href="PHP/logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Address</h4>
                    <ul style="color:white;">
                    <li><a href="https://www.greaternoidaauthority.in/">
                    <span class="fas fa-map-marker-alt"></span>
                    <span class="text">Greater Noida Uttar Pradesh</span>
                    </a></li>

                    <li><a><span class="fas fa-envelope"></span>        
                      <span class="text">foodhut@gmail.com</span>
                    </a></li>
                        <li><a>
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+91-8595839790</span>
                        </a></li>
                        
                    </ul>
                </div>
                <div class="footer-col"  id="Contact Us">
                    <h4>Contact Us</h4>
                   
                    <form method="POST">
                        <input type="email" placeholder="Enter Email" class="inputName" name="email" required>
                        <input type="text" placeholder="Message" class="inputEmail" name="message" required>
                        <input type="submit" value="Submit" class="inputSubmit" name="submit">
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p>&#169; FOODHUT</p>
                </div>
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href="admin/index.php"><i class="fa fa-user" style="font-size:24px"></i></a>
                </div>
            </div>
        </div>
    </footer>


    <script src="JS/main.js"></script>
<script type="text/javascript">
    window.history.forward();
</script>

</body>

</html>