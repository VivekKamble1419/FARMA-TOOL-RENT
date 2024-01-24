<?php
require 'connection/config.php';

if(isset($_POST['reject_order']) && isset($_POST['product_id'])){
    $order_id = $_POST['product_id'];

    // Update order status to 'Rejected'
    $updateQuery = "UPDATE orders SET order_status = 'Rejected' WHERE product_id = $product_id";
    mysqli_query($conn, $updateQuery);

    // Redirect back to the seller dashboard
    header("Location: seller_dashboard.php");
    exit();
}

// Add similar logic for accepting orders if needed

mysqli_close($conn);
?>
