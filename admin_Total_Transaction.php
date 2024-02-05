
<?php
require 'connection/config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}

// Fetch orders from the database with order_status = 'Delivered'
$orderQuery = "SELECT * FROM orders WHERE order_status = 'Delivered'";
$orderResult = mysqli_query($conn, $orderQuery);
// Initialize total payable amount variable
$totalPayableAmount = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c384a;
            color: white;
            padding: 5px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000; /* Set a higher z-index to make sure it's above other elements */
        }

        nav {
            background-color: gainsboro;
            padding: 10px;
            padding-left: 300px;
            position: sticky;
            top: 55px; /* Height of the header */
            z-index: 1000; /* Set a higher z-index to make sure it's above other elements */
        }

        nav a {
          
            color: black;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            margin: 0 20px;
        }

        nav a:hover {
            background-color: #777;
        }

      
        .main {
            display: flex;
            height: 82vh;
        }

        .btns {
            width: 20%; /* 30% width, fixed size */
            background-color: #3c4b64;
            padding: 10px;
            box-sizing: border-box;
            overflow-y: auto; /* Enable vertical scrolling */
        }
        .btns .btn{
          margin-top: 20px;
        }
     
        .info {
            flex: 1; /* Takes the remaining 70% */
            padding: 5px;
            overflow-y: auto; /* Enable vertical scrolling */
            display: flex;
            gap: 10px;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .btn {
            width: 100%;
            background-color: #3c4b64;
            font-size: 18px;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        .btn:hover {
            background-color: #777;
        }
      
        
        .info {
            padding: 20px;
            overflow-y: auto;
        }

        
        /* Additional styles for the order details table */
        .order-table {
            width: 100%;
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
    </style>
    <!-- Add this in the <head> section of your HTML -->

</head>
<body>
    <header>
        <h3>Welcome, <?php echo $customerRow['username']; ?></h3>
    </header>

    <nav>
         
        <a href="admin_Dashboard.php">Home</a>
        <a href="admin_customers.php">Customers</a>
        <a href="admin_seller.php">Sellers</a>
        <a href="admin_products.php">Products</a>

    </nav>

    <section class="main">
    <div class="btns">
      <a href="#"  style="text-decoration: none;"> <button class="btn"  style="background-color: gray; color: black;">Total Transactions</button>  </a>
      <a href="admin_Total_orders.php">
    <button class="btn">Total Orders</button>
</a>
      <a href="admin_user_accounts.php"> <button class="btn">User Accounts</button>     </a>
      <a href="admin_feedback.php"><button class="btn">Feedback</button>
</a>
    <a href="logout.php"> <button class="btn">Logout</button>          </a>
    </div>
    <div class="info">
    <h2>Total Orders (Delivered)</h2>
        <a href="#" style="text-decoration: none;">
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
                   border-radius: 8px;">
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

</body>
</html>

