<?php
// Include database connection
include "database/connection.php";

// Check if the order_id is set via POST
if(isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];

    // Step 1: Delete all items related to the order from the user_order table
    $delete_items_query = "DELETE FROM `user_order` WHERE `Order_Id` = '$order_id'";
    if(mysqli_query($conn, $delete_items_query)){
        // Step 2: Delete the order from the orders table
        $delete_order_query = "DELETE FROM `orders` WHERE `Order_Id` = '$order_id'";

        if(mysqli_query($conn, $delete_order_query)){
            // Redirect back to the orders list page after successful deletion
            echo "<script>
        alert(' Order Successfully Deleted');
        window.location.href='orders.php';
        </script>";
            exit;
        } else {
            echo "Error deleting order: " . mysqli_error($conn);
        }
    } else {
        echo "Error deleting order items: " . mysqli_error($conn);
    }
} else {
    echo "No order ID provided.";
}

// Close the database connection
mysqli_close($conn);
?>
