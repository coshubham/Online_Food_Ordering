<?php include 'PHP/Database/Connection.php'; 
    
    // insert Data in users table
if(isset($_POST['submit'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $Email=$_POST['Email'];
    $phone_number=$_POST['phone_number'];
    $Password=$_POST['Password'];
    $Password=md5($Password);
    $delivery_address=$_POST['delivery_address'];
    
     $checkEmail="SELECT * From users where Email='$Email'";
     $result=$conn->query($checkEmail);
     if($result->num_rows>0){
        echo '<script>alert("Eamil Address is Already Exists !")</script>';
    }
    else{
        $insertQuery="INSERT INTO users(first_name,last_name,Email,phone_number,Password,delivery_address)
                    VALUES('$first_name','$last_name','$Email','$phone_number','$Password','$delivery_address')";
            if($conn->query($insertQuery)==TRUE){
            header("location: login.php");
         }
         else{
            echo "Error:".$conn->error;
         }

    }

}
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/signup.css">
    <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <title>Sign Up</title>
</head>

<body>
    <div id="preloader"></div>
    <section class="menu">
        <div class="content">
            <div class="content-left">
                <div class="nav">
                    <div class="logo">
                        <h1>Food<b>Hut</b></h1>
                    </div>
                    <ul>
                        <li><a href="index.php" class="active">Home</a></li>
                        <li><a href="login.php" class="active">Sign In</a></li>
                        <li><a href="#" class="active">About Us</a></li>
                    </ul>
                    <img src="images/pikaso_embed.png" alt="">
                </div>
            </div>
            <div class="content-right">
                <div class="container">
                    <h1>Sign Up</h1>
                    <form method="post" action="signup.php">
                        <input type="text" id="firstName" name="first_name" placeholder="First Name" required>
                        <input type="text" id="lastName" name="last_name" placeholder="Last Name" required>
                        <input type="email" id="email" name="Email" placeholder="Email Address" required>
                        <input type="tel" id="phone" name="phone_number" placeholder="Phone Number" required>
                        <input type="password" id="password" name="Password" placeholder="Password" required>
                        <textarea id="address" placeholder="Delivery Address" name="delivery_address" required></textarea>
                        <button type="submit" name="submit" class="submit-btn">Submit</button>
                        <a href="login.php">
                            <p class="ram">Already have an account? <span style="color:#fe523b" ;>Sign In Now</span>
                                <i class="fas fas fa-long-arrow-alt-right"
                                    style="color:#fe523b; font-size:1.2rem; position: relative; top:3.6px;" ;></i>
                            </p>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="JS/main.js"></script>
</body>

</html>