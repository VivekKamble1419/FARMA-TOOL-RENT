<?php 
require 'connection/config.php';

if (!empty($_SESSION['Customer_id'])) {
    $Customer_id = $_SESSION['Customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id = $Customer_id");
    $row = mysqli_fetch_assoc($result);
    $ordersResult = mysqli_query($conn, "SELECT * FROM orders WHERE Customer_id = $Customer_id ORDER BY order_date_time DESC");

} else {
    header("Location: Customer_login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
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
    }
    .image1 {
        width: 100%;
        margin: auto;
        align-items: center;
        text-align: center;
    }
    .info1{
        width: 100%;
        margin: auto;
        justify-content: left;
        line-height: 2;
        font-size: 20px;
        font-weight: 600;
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


</style>
<body>
    <section class="section1">
        <div class="logo">
            <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
            <h1>Welcome  <?php echo $row["Full_name"];?></h1>
            <div class="menu" id="menu">
                <a href="Customer_Dashboard.php">Home</a>
                <a href="Customer_orders.php">Orders</a>
                <a href="Customer_Profile.php">Profile</a>
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
        <h1>Your Orders</h1>

        <?php
        // Loop through orders and display them
        while ($orderRow = mysqli_fetch_assoc($ordersResult)) {
            // Fetch product image from sell_product table using Seller_id
            $product_id = $orderRow['product_id'];
            $imageQuery = mysqli_query($conn, "SELECT product_image FROM sell_product WHERE product_id = $product_id");
            $imageRow = mysqli_fetch_assoc($imageQuery);
        ?>
            <div class="orders">
                <div class="image1">
                    <img src="<?php echo $imageRow['product_image']; ?>" alt="Product Image">
                </div>

                <div class="info1">
                   

                    <p>Product Name: <?php echo $orderRow['Product_name']; ?></p>
                    <p>Order for: <?php echo $orderRow['order_for']; ?> Days</p>
                    <p>Order Quantity: <?php echo $orderRow['order_quantity']; ?></p>
                    <p>Place: <?php echo $orderRow['Location']; ?></p>
                    <p>Payable Amount: <?php echo $orderRow['total_payable']; ?></p>

                </div>

                <!-- Modify the part where you display order details -->
                    
                      <!-- Add a class to the div that contains the rejection message -->
                      <div class="place <?php echo ($orderRow['order_status'] == 'Rejected') ? 'rejected' : ''; ?>">
                            <?php
                            if ($orderRow['order_status'] == 'Rejected') {
                                echo "<p id='rejected'>Order Rejected</p><br>";
                                echo "<p class='detail'>Sorry for Inconvenience.<br> Product is Not Available Now. <br>Seller will not proceed with this order.<br>Seller will contact you soon.</p>";
                            } else if ($orderRow['order_status'] == 'Accepted') {
                                echo "<p>Order Accepted</p><br>";
                                echo "<p class='detail'>Seller will contact you soon.</p>";
                            } else {
                                echo "<p>Order Placed</p><br>";
                                echo "<p class='detail'>Your Order is Placed. <br>Wait Untill Seller will Accept your Order. <br>Seller will contact you soon.</p>";
                            }
                            ?>
                        </div>


                    

            </div>
        <?php
        }
        ?>
    </section>
    <script src="JavaScript/Index.js"></script>
</body>
</html>
