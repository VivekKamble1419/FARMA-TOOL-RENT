<?php
require 'config.php';

if (!empty($_SESSION['Seller_id'])) {
    $Seller_id = $_SESSION['Seller_id'];
    $result = mysqli_query($conn, "SELECT * FROM s_signup WHERE Seller_id = $Seller_id");
    $row = mysqli_fetch_assoc($result);
    $ordersResult = mysqli_query($conn, "SELECT * FROM orders WHERE Seller_id = $Seller_id ORDER BY order_date_time DESC");
} else {
    header("Location: Seller_login.php");
}

// Fetch orders from the database with order_status = 'Delivered'
$orderQuery = "SELECT * FROM orders WHERE order_status = 'Delivered' AND Seller_id=$Seller_id" ;
$orderResult = mysqli_query($conn, $orderQuery);
// Initialize total payable amount variable
$totalPayableAmount = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Income</title>
    <link rel="shortcut icon" href="fab.jpg" />
    <link rel="stylesheet" href="Index2.css">
    <link rel="stylesheet" type="text/css" href="Print.css" media="print">

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


/* Additional styles for the order details table */
.order-table {
            width: 100%;
            margin-inline: 30px;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-table th, .order-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .order-table th {
            background-color: #f2f2f2;
        }

        .order-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .order-table th,
.order-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    white-space: nowrap; /* Add this line to prevent text wrapping */
}

.order-table th {
    background-color: #f2f2f2;
}

.order-table tr:nth-child(even) {
    background-color: #f9f9f9;
}
.orders-dt{
        width: 100%;
        margin: auto;
        text-align: center;
        margin-top: 20px;
    }
</style>
<body>
<div class="orders-dt">
                <div class="text">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
                    <h3>Vishrambag Sangli, Maharashtra,416416</h3>
                    <h3>Contact: 7709629488 Email: mrvivekkamble8@gmail.com</h3>
                    <h3>Contact: 8208951770 Email: chaitanyakashid961@gmail.com</h3>
                    <br>
                </div>
                <hr>
</div>

    <section class="section-2">
    <h1>Total Income</h1>
    <h1>Total Orders (Delivered)</h1>

    <div class="info">
    <a href="#" style="text-decoration: none;" id="prnt-btn">
                    <button style="background-color: #4CAF50; /* Green */
                   border: none;
                   color: white;
                   padding: 15px 32px;
                   text-align: center;
                   text-decoration: none;
                   display: inline-block;
                   font-size: 16px;
                   margin: 4px 2px;
                   cursor: pointer;
                   border-radius: 8px;" onclick="window.print()">
                    Download Report
                    </button>
        </a>
        <table class="order-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Product Name</th>
                        <th>Order Id</th>
                        <th>Seller ID</th>
                        <th>Customer ID</th>
                        <th>Product ID</th>
                        <th>Location</th>
                        <th>Quantity</th>
                        <th>Order For</th>
                        <th>Order Status</th>
                        <th>Order Date and Time</th>
                        <th>Rent</th>
                        <th>Payable Amount</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                                    $counter = 1; // Initialize counter

                    while ($orderRow = mysqli_fetch_assoc($orderResult)) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$orderRow['Product_name']}</td>";
                        echo "<td>{$orderRow['id']}</td>";
                        echo "<td>{$orderRow['Seller_id']}</td>";
                        echo "<td>{$orderRow['Customer_id']}</td>";
                        echo "<td>{$orderRow['product_id']}</td>";
                        echo "<td>{$orderRow['Location']}</td>";
                        echo "<td>{$orderRow['order_quantity']}</td>";
                        echo "<td>{$orderRow['order_for']} Day's</td>";
                        echo "<td>{$orderRow['order_status']}</td>";
                        echo "<td>{$orderRow['order_date_time']}</td>";
                        echo "<td>{$orderRow['rent']}</td>";
                        echo "<td style='font-weight: bold;'>{$orderRow['total_payable']}</td>";
                        echo "</tr>";
           
                        $totalPayableAmount += floatval($orderRow['total_payable']);

                        echo "<tr>";
                        echo "<td colspan='12' style='text-align: right; font-weight: bold;'>Total Payable Amount:</td>";
                        echo "<td style='font-weight: bold;'>{$totalPayableAmount}</td>";
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                    ?>
                    
                </tbody>

            </table>
        
    </div>
    
  
  
</section>
<script>

</script>

    <script src="JavaScript/Index.js"></script>
</body>
</html>
