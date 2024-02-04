<?php
// delete_product.php

require 'connection/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['productId'])) {
        $productId = $_POST['productId'];

        // Perform the deletion in the database
        $deleteQuery = "DELETE FROM sell_product WHERE product_id = $productId";
        $deleteResult = mysqli_query($conn, $deleteQuery);

        if ($deleteResult) {
            echo 'success';
            exit();
        } else {
            echo 'error';
            exit();
        }
    }
}
?>
