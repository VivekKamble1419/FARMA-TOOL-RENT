<?php
require 'connection/config.php';

if (!empty($_POST['product_id']) && !empty($_POST['selectedStatus'])) {
    $sellerId = $_POST['product_id'];
    $selectedStatus = $_POST['selectedStatus'];

    // Update the account status in the database
    $updateQuery = "UPDATE sell_product SET Product_status = '$selectedStatus' WHERE product_id = '$sellerId'";
    $result = mysqli_query($conn, $updateQuery);

    if ($result) {
        echo 'Account status updated successfully';
    } else {
        echo 'Failed to update account status';
    }
} else {
    echo 'Invalid request';
}
?>
