<?php
require 'connection/config.php';

if (!empty($_POST['Customer_id']) && !empty($_POST['selectedStatus'])) {
    $sellerId = $_POST['Customer_id'];
    $selectedStatus = $_POST['selectedStatus'];

    // Update the account status in the database
    $updateQuery = "UPDATE c_signup SET Account_status = '$selectedStatus' WHERE Customer_id = '$sellerId'";
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
