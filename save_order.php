<?php
session_start();
require 'connection/config.php';

// Assuming you have a table named 'orders'
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Product_name = $_POST['Product_name'];
    $Seller_id = $_POST['Seller_id'];
    $Location = $_POST['Location'];
    $order_for = $_POST['order_for'];
    $order_quantity = $_POST['order_quantity'];
    $Customer_id = $_SESSION['Customer_id'];
    $product_id = $_POST['product_id']; // Change this line

    $rent = $_POST['rent']; // Make sure this matches the field name in your table
    $payableAmount = $_POST['payableAmount']; // Make sure this matches the field name in your table

    // Add the order_date_time column to your orders table
    $order_date_time  = date('Y-m-d H:i:s'); // Get the current date and time in the format YYYY-MM-DD HH:MM:SS

    // Perform the database insertion with the current date and time
    $sql = "INSERT INTO orders (Product_name, Seller_id, Location, order_for, order_quantity, Customer_id, product_id, rent, total_payable, order_date_time ) 
            VALUES ('$Product_name', '$Seller_id', '$Location', '$order_for', '$order_quantity', '$Customer_id', '$product_id', '$rent', '$payableAmount', '$order_date_time ')";

    if (mysqli_query($conn, $sql)) {
        echo 'Order placed successfully';
    } else {
        echo 'Error placing order: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid request method';
}
?>
