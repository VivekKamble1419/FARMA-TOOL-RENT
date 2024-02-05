<?php
require 'connection/config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}

// Get the selected location from the URL parameter
$selectedLocation = isset($_GET['location']) ? $_GET['location'] : null;

// Fetch count of rows from the orders table
$ordersCountQuery = "SELECT COUNT(*) as totalOrders FROM orders";
$ordersCountResult = mysqli_query($conn, $ordersCountQuery);
$ordersCountData = mysqli_fetch_assoc($ordersCountResult);
$totalOrders = $ordersCountData['totalOrders'];

// Fetch count of completed orders
$completedOrdersCountQuery = "SELECT COUNT(*) as completedOrders FROM orders WHERE order_status = 'Delivered'";
$completedOrdersCountResult = mysqli_query($conn, $completedOrdersCountQuery);
$completedOrdersCountData = mysqli_fetch_assoc($completedOrdersCountResult);
$completedOrders = $completedOrdersCountData['completedOrders'];

// Fetch count of pending orders
$pendingOrdersCountQuery = "SELECT COUNT(*) as pendingOrders FROM orders WHERE order_status = 'Accepted'";
$pendingOrdersCountResult = mysqli_query($conn, $pendingOrdersCountQuery);
$pendingOrdersCountData = mysqli_fetch_assoc($pendingOrdersCountResult);
$pendingOrders = $pendingOrdersCountData['pendingOrders'];


// Fetch count of rejected orders
$rejectedOrdersCountQuery = "SELECT COUNT(*) as rejectedOrders FROM orders WHERE order_status = 'Rejected'";
$rejectedOrdersCountResult = mysqli_query($conn, $rejectedOrdersCountQuery);
$rejectedOrdersCountData = mysqli_fetch_assoc($rejectedOrdersCountResult);
$rejectedOrders = $rejectedOrdersCountData['rejectedOrders'];

// Fetch count of rejected orders
$totalcustomersCountQuery = "SELECT COUNT(*) as totalcustomers FROM c_signup ";
$totalcustomersCountQueryResult = mysqli_query($conn, $totalcustomersCountQuery);
$totalcustomersCountQueryData = mysqli_fetch_assoc($totalcustomersCountQueryResult);
$totalcustomers = $totalcustomersCountQueryData['totalcustomers'];

// Fetch count of rejected orders
$totalsellersCountQuery = "SELECT COUNT(*) as totalsellers FROM s_signup ";
$totalsellersCountQueryResult = mysqli_query($conn, $totalsellersCountQuery);
$totalsellersCountQueryData = mysqli_fetch_assoc($totalsellersCountQueryResult);
$totalsellerss = $totalsellersCountQueryData['totalsellers'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="shortcut icon" href="images/favicon.png" />
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
            padding: 20px;
            overflow-y: auto; /* Enable vertical scrolling */
            display: block;
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
      
        .cards-2 {
    display: flex;
    gap: 20px; /* Adjust the gap between cards */
}

.card {
    height: 180px;
    width: 250px;
    background-color: #fff;
    padding: 15px;
    margin-left: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px black;
    overflow: hidden;
    display: flex;
    
    flex-direction: column;
    justify-content: space-between;
}

        .cards{
          display: flex;
        }
        #card-1{
          background-color: #321fdb;
        }
        #card-2{
          background-color: #3399ff; 
        }
        #card-3{
          background-color: #f9b115; 
        }
        #card-4{
          background-color: #e55353;
        }
        #card-total-customers{
            background-color: gray;
            color: black;
        }
        #card-total-sellers{
            background-color: palevioletred;
            color: black;
        }
        canvas {
            max-width: 100%;
        }
        .running-effect {
            font-size: 30px;
            text-align: center;
            font-weight: bold;
            color: white;
        }
        
    </style>
</head>
<body>
    <header>
        <h3>Welcome, <?php echo $customerRow['username']; ?></h3>
    </header>

    <nav>
    <a href="admin_Dashboard.php" style="text-decoration: none; background-color: gray; color: black;">
            Home
        </a>
        <a href="admin_customers.php">Customers</a>
        <a href="admin_seller.php">Sellers</a>
        <a href="admin_products.php">Products</a>

    </nav>

    <section class="main">
    <div class="btns">
      <a href="#"> <button class="btn">Total Transactions</button>  </a>
      <a href="admin_Total_orders.php"> <button class="btn">Total Orders</button>       </a>
      <a href="admin_user_accounts.php"> <button class="btn">User Accounts</button>     </a>
      <a href="admin_feedback.php">  <button class="btn">Feedback</button>        </a>
    <a href="logout.php"> <button class="btn">Logout</button>          </a>
    </div>
        <div class="info">
          <div class="cards">

            <div class="card" id="card-1">
            <h2>Total Orders</h2>
            <p class="running-effect" id="runningEffect1"><?php echo $totalOrders; ?></p>
        </div>
        <div class="card" id="card-2">
            <h2>Completed Orders</h2>
            <p class="running-effect" id="runningEffect2"><?php echo $completedOrders; ?></p>
        </div>
        <div class="card" id="card-3">
            <h2>Pending Orders</h2>
            <p class="running-effect" id="runningEffect3"><?php echo $pendingOrders; ?></p>
        </div>
        <div class="card" id="card-4">
            <h2>Cancelled Orders</h2>
            <p class="running-effect" id="runningEffect4"><?php echo $rejectedOrders; ?></p>
        </div>
          </div>
          <br><br>
         <div class="cards-2">
                <div class="card" id="card-total-customers">
                    <h2>Total Customers</h2>
                    <p class="running-effect" id="runningEffect5"><?php echo $totalcustomers; ?></p>
                </div>
                <div class="card" id="card-total-sellers">
                    <h2>Total Sellers</h2>
                    <p class="running-effect" id="runningEffect6"><?php echo $totalsellerss; ?></p>
                </div>
        </div>
          
        </div>
    </section>
    <script>
        // Running effect for all cards
        document.addEventListener('DOMContentLoaded', function() {
            const targets = [
                <?php echo $totalOrders; ?>,
                <?php echo $completedOrders; ?>,
                <?php echo $pendingOrders; ?>,
                <?php echo $rejectedOrders; ?>,
                <?php echo $totalcustomers; ?>,
                <?php echo $totalsellerss; ?>,
            ];

            for (let i = 0; i < targets.length; i++) {
                const runningEffectElement = document.getElementById('runningEffect' + (i + 1));
                const targetNumber = targets[i];

                for (let j = 1; j <= targetNumber; j++) {
                    setTimeout(() => {
                        runningEffectElement.textContent = j;
                    }, j * 200);
                }
            }
        });
    </script>
</body>
</html>

