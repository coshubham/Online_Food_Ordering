<?php
 session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(isset($_POST['Add_to_cart']))
  {
    if(isset($_SESSION['cart']))
    {
        $myitem=array_column($_SESSION['cart'],'food_name');
        if(in_array($_POST['food_name'],$myitem))
        {
            echo "<script>
            alert('Food Already Added');
            window.location.href='order_now.php';
            </script>";
        }else{
            $count=count($_SESSION['cart']);
            $_SESSION['cart'][$count]=array('food_name'=>$_POST['food_name'],'price'=>$_POST['price'],'Quantity'=>1);
            echo "<script>
            alert('Food Added to cart Successfully');
            window.location.href='order_now.php';
            </script>";

        }
    
    }
    else
    {
        $_SESSION['cart'][0]=array('food_name'=>$_POST['food_name'],'price'=>$_POST['price'],'Quantity'=>1);
        echo "<script>
            alert('Food Added to cart Successfully');
            window.location.href='order_now.php';
            </script>";
    }
  }
  if(isset($_POST['Remove_food']))
  {
    foreach($_SESSION['cart'] as $key => $value)
    {
        if($value['food_name']==$_POST['food_name'])
        {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values($_SESSION['cart']);
            echo "<script>
            alert('Food Remove Successful');
            window.location.href='cart.php';
            </script>";
        }

    }
  }
  if(isset($_POST['Mod_Quantity'])){
    foreach($_SESSION['cart'] as $key => $value)
    {
        if($value['food_name']==$_POST['food_name'])
        {
          $_SESSION['cart'][$key]['Quantity']=$_POST['Mod_Quantity'];
        
            echo "<script>
            window.location.href='cart.php';
            </script>";
        }

    }

  }
}

?>