<?php
include ("PHP/Database/Connection.php"); 
 session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST['buy']))
    { 
       $query1="INSERT INTO `orders`(`full_name`, `phone_no`, `address`, `pay_mode`,`email`) VALUES ('$_POST[full_name]','$_POST[phone_no]','$_POST[address]','$_POST[pay_mode]','$_POST[email]')";
                if(mysqli_query($conn,$query1))
                {
                    $Order_Id=mysqli_insert_id($conn);
                    $query2="INSERT INTO `user_order`(`Order_Id`, `Name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
                    $stmt=mysqli_prepare($conn,$query2);
                    if($stmt)
                    {
                        mysqli_stmt_bind_param($stmt,"isii",$Order_Id,$Name,$Price,$Quantity);
                        foreach($_SESSION['cart'] as $key => $values)
                        {
                            $Name=$values['food_name'];
                            $Price=$values['price'];
                            $Quantity=$values['Quantity'];
                            mysqli_stmt_execute($stmt);
                        }
                        unset($_SESSION['cart']);
                        echo "<script>
                        alert('Order Placed Successfully');
                        window.location.href='your_order.php';
                        </script>";

                    }
                    else{
                        echo "<script>
                        alert('SQL query prepare Error');
                        window.location.href='cart.php';
                        </script>";
                    }
             }
             else{
                echo "<script>
                alert('SQL Error');
                window.location.href='cart.php';
                </script>";
             }
    
        }
    

    }

?>



