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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <title>Food Ordering</title>
    <style>
        body{
            background-color: whitesmoke;
        }
        img {
            width: 75px;
            height: 60px;
            align-items: center;
            justify-content: center;
        }

        td {
            justify-content: center;
            text-align: center;
            font-family: sans-serif;
            top: 40px;
            font-weight: 500;
        }

        th {
            justify-content: center;
            text-align: center;
            font-family: sans-serif;
            font-weight: bolder;
        }

        .quantity {
            width: 60px;
            height: 20%;
            text-align: center;
            margin-top: 10px;
        }

        .icon {
            font-size: 30px;
            margin-top: 20px;
            margin-left: 40px;
            padding: 0px 5px;
            color: #000;
        }

        .icon:hover {
            color: #ec4d37;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 90px;
            background-color: #fe523b;
        }
    </style>
</head>

<body>
    <a href="order_now.php">
        <div class="icon"><i class="far fas fa-arrow-left"></i></div>
    </a>
   
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="mb-5" style=" text-align: center;"><b>MY FOODS</b></h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Items</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_SESSION['cart']))
                        {
                        foreach($_SESSION['cart'] as $key => $value)
                        {
                            $sr=$key+1;
                            echo"
                           
                            <tr>
                            <td>$sr</td>
                            <td>$value[food_name]</td>
                            <td>Rs.$value[price]<input type='hidden' class='iprice' name='Price' value='$value[price]'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' value='$value[Quantity]' min='1' max='10' type='number'>
                            <input type='hidden' name='food_name' value='$value[food_name]'>
                            </form>
                            </td>
                            <td class='itotal'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <button class='btn btn-danger' name='Remove_food'>Delete</button>
                            <input type='hidden' name='food_name' value='$value[food_name]'>
                            </form>
                            </td>
                            </tr>  
                            ";
                        }
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        
            <div class="col-lg-4 py-3">
            <div class="border bg-light rounded p-4">
                <h4><b>Grand Total (Rs.):</b></h4>
                    <h5 id="gtotal" style="margin-left:13rem; font-size:27px; font-weight:700; margin-top:-40px;"></h5>
                    <br>
                    <?php
                    if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
                    {
                    ?>
                  <form method="POST" action="purchase.php">
                    <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" required>
                    </div>
                    <div class="form-group">
                    <label>Your Email</label>
                    <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" class="form-control" name="phone_no" required>
                    </div>
                    <div class="form-group">
                    <label>Delivery Address</label>
                     <textarea class="form-control" rows="3" name="address" required></textarea>
                    </div>
                    <br>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault" checked>
               <label class="form-check-label" for="flexRadioDefault2">
               Cash on Delivery
               </label>
                </div>
                <br>
                <button class="btn btn-success btn-md" name="buy" type="submit">Order Now</button>
            </form>
            <?php 
                    }
            ?>
                </div> 
            </div>
        </div>
    </div>
                </div>
    <script>
        var gt=0;
        var iprice=document.getElementsByClassName('iprice');
        var iquantity=document.getElementsByClassName('iquantity');
        var itotal=document.getElementsByClassName('itotal');
        var gtotal=document.getElementById('gtotal');


        function subTotal()
        {
            gt=0;
            for(i=0;i<iprice.length;i++)
            {
               itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

               gt=gt+(iprice[i].value)*(iquantity[i].value);
            }
            gtotal.innerText=gt;
        }

        subTotal();
    </script>

</body>

</html>