<?php
session_start();
include 'Database/Connection.php';

if (!isset($_SESSION['Email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['Email'];
$orderId = $_POST['order_id'];

$order_check_query = "SELECT * FROM orders WHERE Order_Id='$orderId' AND email='$userEmail'";
$order_check_result = mysqli_query($conn, $order_check_query);

if (mysqli_num_rows($order_check_result) > 0) {
    $delete_query = "DELETE FROM orders WHERE Order_Id='$orderId'";
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>
        alert(' Order Successfully Deleted');
        window.location.href='../Homepage.php';
        </script>";
        exit();
    } else {
        echo "Error deleting order.";
    }
} else {
    echo "You cannot delete this order.";
}
?>
