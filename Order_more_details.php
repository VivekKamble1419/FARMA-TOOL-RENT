<?php
require 'connection/config.php';

if (!empty($_SESSION['Customer_id'])) {
    $Customer_id = $_SESSION['Customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id = $Customer_id");
    $row = mysqli_fetch_assoc($result);

    if (isset($_GET['id'])) {
        $orderId = $_GET['id'];
    
        // Fetch order details based on the provided order ID
        $orderResult = mysqli_query($conn, "SELECT * FROM orders WHERE id = $orderId");
        $orderRow = mysqli_fetch_assoc($orderResult);
    
        if (!$orderRow) {
            // Handle case where order with the provided ID is not found
            // echo "Order not found.";
            exit();
        }
    
        // Fetch product image from sell_product table using Product_id and Seller_id
        $productId = $orderRow['product_id'];
        $sellerId = $orderRow['Seller_id'];
    
        // After fetching the image from sell_product table
        $imageQuery = mysqli_query($conn, "SELECT product_image FROM sell_product WHERE product_id = $productId AND Seller_id = $sellerId");
        $imageRow = mysqli_fetch_assoc($imageQuery);
    
        // Debugging
       // var_dump($imageQuery); // Check if the query is successful
        //var_dump($imageRow);   // Check the fetched image row
    } else {
        // Handle case where 'id' is not set in the URL
        header("Location: Customer_orders.php");
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Details</title>
    <link rel="stylesheet" href="Css/Index2.css">
</head>
<style>
body {
        margin: 0;
        padding: 0;
    }
    .section-2 {
        padding-top: 10%;
        width: 100%;
        height: auto;
        padding-bottom: 100px;
    }
    .section-2 h1 {
        margin-left: 4%;
        padding-bottom: 20px;
    }
    .card {
        width: 80%;
        margin: auto;
        background-color: #F5F5F5;
        box-shadow: 2px 2px 2px 2px gray;
        padding: 20px;
        margin-top: 2rem;
        display: flex;
        justify-content: space-between;
    }
    .card img {
        width: 300px;
        height: 250px;
    }
    .order-details {
        width: 50%;
    }
    .order-details p {
        font-size: 18px;
        line-height: 2;
    }
    /* Add these styles to your existing CSS code */
.order-tracker {
    width: 80%;
    margin: auto;
    background-color: #fff;
    box-shadow: 2px 2px 2px 2px gray;
    padding: 20px;
    margin-top: 2rem;
}

.order-tracker h2 {
    text-align: center;
    color: #333;
}

.status-bar {
    display: flex;
    justify-content: space-between;

    margin-top: 20px;
}

.status {
    flex: 1;
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #eee;
    color: #777;
}

.status-bar {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.status {
    flex: 1;
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #777;
}

.status.active {
    background-color: #4CAF50; /* Green for active status */
    color: #fff;
}

.status.Placed {
    background-color: #3498db; /* Blue for Placed status */
}

.status.Accepted {
    background-color: #f39c12; /* Orange for Accepted status */
}

.status.Shipped {
    background-color: #e74c3c; /* Red for Shipped status */
}

.status.Delivered {
    background-color: #2ecc71; /* Green for Delivered status */
}
.status.active {
    background-color: #4CAF50;
    color: #fff;
}

.status-bar {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.status {
    flex: 1;
    text-align: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    color: #777;
}

.status.active {
    background-color: #4CAF50; /* Green for active status */
    color: #fff;
}

.status.Placed {
    background-color: #3498db; /* Blue for Placed status */
}

.status.Rejected {
    background-color: #e74c3c; /* Red for Rejected status */
    color: #fff;
}
.download {
    margin-left: 700px;
    padding: 50px;
}
/* ... Your existing CSS code ... */

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
        <h1>Order Details</h1>
        <div class="download" <?php echo ($orderRow['order_status'] == 'Delivered') ? '' : 'style="display: none;"'; ?>>
        <a href="Customer_bill.php?id=<?php echo $orderRow['id']; ?>"><button>Genrate Bill</button></a>

</div>

        
                    <div class="order-tracker">
            <h2>Order Tracker</h2>
            <div class="status-bar">
            <div class="status <?php echo ($orderRow['order_status'] == 'Placed') ? 'active' : ''; ?>">Order Placed </div>
            <div class="status <?php echo ($orderRow['order_status'] == 'Rejected') ? 'active Rejected' : ''; ?>">Order Rejected </div>
            <div class="status <?php echo ($orderRow['order_status'] == 'Accepted') ? 'active' : ''; ?>">Order Accepted </div>
            <div class="status <?php echo ($orderRow['order_status'] == 'Shipped') ? 'active' : ''; ?>">Shipped </div>
            <div class="status <?php echo ($orderRow['order_status'] == 'Delivered') ? 'active' : ''; ?>">Delivered</div>
          
                    
                </div>
                </div>
        <div class="card">
            <div class="order-image">
            <img src="<?php echo $imageRow['product_image']; ?>" alt="Product Image">

            </div>
            <div class="order-details">
                <p>Order ID: <?php echo $orderRow['id']; ?></p>
                <p>Product Name: <?php echo $orderRow['Product_name']; ?></p>
                <p>Order for: <?php echo $orderRow['order_for']; ?> Days</p>
                <p>Order Quantity: <?php echo $orderRow['order_quantity']; ?></p>
                <p>Place: <?php echo $orderRow['Location']; ?></p>
                <p>Rent: <?php echo $orderRow['rent']; ?></p>
                <h4>Payment Mode: Cash On Delivery</h4><br>
                <h3>Total Payable: <?php echo $orderRow['total_payable']; ?></h3>
            </div>
            
        </div>
       
    </section>
</body>
</html>