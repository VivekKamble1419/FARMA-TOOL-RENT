<?php
require 'connection/config.php';

if (!empty($_POST['Seller_id']) && !empty($_POST['selectedStatus'])) {
    $sellerId = $_POST['Seller_id'];
    $selectedStatus = $_POST['selectedStatus'];

    // Update the account status in the database
    $updateQuery = "UPDATE s_signup SET Account_status = '$selectedStatus' WHERE Seller_id = '$sellerId'";
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
