<?php 
require 'connection/config.php';

if (!empty($_SESSION['Seller_id'])) {
    $Seller_id = $_SESSION['Seller_id'];
    $result = mysqli_query($conn, "SELECT * FROM s_signup WHERE Seller_id = $Seller_id");
    $row = mysqli_fetch_assoc($result);
    $ordersResult = mysqli_query($conn, "SELECT * FROM sell_product WHERE Seller_id = $Seller_id ");

} else {
    header("Location: Seller_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Products</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />

    <link rel="stylesheet" href="Css/Index2.css">
</head>
<style>
    body {
        margin: 0;
        padding: 0;
    }
    .section-2{
        padding-top: 10%;
        width: 100%;
        height: auto;
        padding-bottom: 100px;
    }
    .section-2 h1{
        margin-left: 4%;
        padding-bottom: 20px;
    }
    .image1 img{
        width: 80%;
        height: 250px;
        transition: filter 0.5s, opacity 0.5s; /* Add a transition for smooth changes */

    }
    .image1.hidden-order img {
        filter: blur(5px); /* Set blur value for hidden orders */
        opacity: .9;
    }
    .image1 {
        width: 100%;
        margin: auto;
        align-items: center;
        text-align: center;
    }
    .info1 {
        width: 100%;
        margin: auto;
        justify-content: left;
        line-height: 2;
        font-size: 20px;
        font-weight: 600;
    }
    .info1 h4 {
    z-index: 900;
    text-align: center;
    color: red; /* Style the h4 text */
    animation: blink 1s infinite; /* Apply blink animation */
}

@keyframes blink {
    50% {
        opacity: 0; /* Set opacity to 0 at 50% of the animation duration */
    }
}

    .place{
        width: 100%;
        margin: auto;
        align-items: center;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
    }
    .orders{
        width: 80%;
        height: 300px;
        margin: auto;
        margin-top: 2rem;
        display: flex;
        background-color: #F5F5F5;
        box-shadow: 2px 2px 2px 2px gray;
    }
    .place p{
        color: green;
    }
    .place .detail{
        font-size: 14px;
        color: red;
    }
/* Add styles for the rejected class */
#rejected {
    color: red;
    font-weight: 800;
}

/* Add styles for the detail class within the rejected class */
.place.rejected .detail {
    color: orange; /* Set the color for the detail message within rejected orders */
}
.hidden-order {
    pointer-events: none; /* Disable pointer events for hidden orders */
}

.status-text {
    color: red; /* Style the status text for hidden orders */
}
.image1.blurred img {
        filter: blur(1px); /* Set blur value for hidden orders */
    }
.orders.hidden-order {
        /* background-color:    #FAA0A0   ; */
    }
</style>
<body>
    <section class="section1">
        <div class="logo">
            <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
            <h1>Welcome  <?php echo $row["Full_name"];?></h1>
            <div class="menu" id="menu">
                <a href="Seller_Dashboard.php">Home</a>
                <a href="Seller_Profile.php">Profile</a>
                <a href="Seller_all_orders.php">All Orders</a>
                <a href="logout.php">Logout</a>
            </div>
            <div class="icon" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </section>
    <section class="section-2">
    <h1>All Products</h1>

    <?php
    while ($orderRow = mysqli_fetch_assoc($ordersResult)) {
        $product_id = $orderRow['product_id'];
        $imageQuery = mysqli_query($conn, "SELECT product_image FROM sell_product WHERE product_id = $product_id");
        $imageRow = mysqli_fetch_assoc($imageQuery);
    ?>
    <div class="orders <?php echo $orderRow['Product_status'] === 'Hide' ? 'hidden-order' : ''; ?>">
    <div class="image1 <?php echo $orderRow['Product_status'] === 'Hide' ? 'hidden-order' : ''; ?>">
                <img src="<?php echo $imageRow['product_image']; ?>" alt="Product Image">
            </div>

        <div class="info1">
            <?php if ($orderRow['Product_status'] === 'Hide') : ?>
                <h4 class="status-text">Warning....!<br> Suspicious product Detected.Product by Hidden Admin.</h4>
            <?php else : ?>
                <p>Product Name: <?php echo $orderRow['Product_name']; ?></p>
                <p>Available Quantity: <?php echo $orderRow['available_qantity']; ?></p>
                <p>Rent: <?php echo $orderRow['rent']; ?></p>
                <button class="delete-product-button" data-product-id="<?php echo $orderRow['product_id']; ?>">Delete Product</button>
            <?php endif; ?>
        </div>
    </div>
    <?php
    }
    if (mysqli_num_rows($ordersResult) == 0) {
        echo "<p>No orders available.</p>";
    }
    ?>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.delete-product-button').on('click', function () {
                var productId = $(this).data('product-id');

                // Display a confirmation dialog
                var confirmDelete = confirm("Are you sure you want to delete this product?");

                if (confirmDelete) {
                    // Send an AJAX request to the server for product deletion
                    $.ajax({
                        type: 'POST',
                        url: 'delete_product.php',
                        data: { productId: productId },
                        success: function (response) {
                            // Handle the response from the server
                            if (response === 'success') {
                                // Reload the page or update the UI as needed
                                location.reload();
                            } else {
                                alert('Error deleting product. Please try again.');
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert('AJAX error: ' + textStatus + ' - ' + errorThrown);
                        }
                    });
                }
            });
        });
    </script>
    <script src="JavaScript/Index.js"></script>
</body>
</html>
