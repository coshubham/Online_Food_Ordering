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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style2.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<footer>
        <div class="container2">
            <div class="row2">

                <!-- 2nd Column -->
                <div class="footer-col1">
                    <h4>Links</h4>
                    <ul>
                        <li><a href="Homepage.php#home">Home</a></li>
                        <li><a href="Homepage.php#About Us">About Us</a></li>
                        <li><a href="#Contact Us">Contact Us</a></li>
                        <li><a href="order_now.php">Order Now</a></li>
                        <li><a href="cart.php">Add to cart</a></li>
                        <li><a href="your_order.php">Your Orders</a></li>
                        <li><a href="PHP/logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="footer-col1">
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
                <div class="footer-col1"  id="Contact Us">
                    <h4>Contact Us</h4>
                   
                    <form method="POST">
                        <input type="email" placeholder="Enter Email" class="inputName" name="email" required>
                        <input type="text" placeholder="Message" class="inputEmail" name="message" required>
                        <input type="submit" value="Submit" class="inputSubmit" name="submit">
                    </form>
                </div>
            </div>
            <hr style="border-top: 1px solid #fff; opacity: 1;">
            <div class="row2">
                <div class="col1">
                    <p>&#169; FOODHUT</p>
                </div>
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                    <a href=""><i class="fa-brands fa-admin"></i></a>
                    <a href="admin/index.php"><i class="fa fa-user" style="font-size:24px"></i></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>