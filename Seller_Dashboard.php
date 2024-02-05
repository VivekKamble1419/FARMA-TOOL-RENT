<?php 
require 'connection/config.php';
if(!empty($_SESSION['Seller_id'])){
    $Seller_id=$_SESSION['Seller_id'];
   $result= mysqli_query($conn, "SELECT * FROM s_signup WHERE Seller_id=$Seller_id");
   
   $row= mysqli_fetch_assoc($result);
}
else{
    header("Location: Seller_login.php");
}
if (isset($_POST['reject_order']) && isset($_POST['id'])) {
    $order_id = $_POST['id'];

    // Update order status to 'Rejected'
    $updateQuery = "UPDATE orders SET order_status = 'Rejected' WHERE id = $order_id";
    mysqli_query($conn, $updateQuery);

    // Redirect back to the seller dashboard
    header("Location: seller_dashboard.php");
    exit();
} elseif (isset($_POST['accept_order']) && isset($_POST['id'])) {
    $order_id = $_POST['id'];

    // Update order status to 'Accepted'
    $updateQuery = "UPDATE orders SET order_status = 'Accepted' WHERE id = $order_id";
    mysqli_query($conn, $updateQuery);

    // Redirect back to the seller dashboard
    header("Location: seller_dashboard.php");
    exit();
}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />

    <link rel="stylesheet" href="Css/Index2.css">
    
<style>
      body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .card img {
            margin: 5%;
            width: 70%;
            height: 100px;
        }
        .card {
                margin: auto;
                padding: 10px;
                width: 85%;
                height: 400px;  
                margin: 30px;
                padding-bottom: 1%;
                display: flex;
                box-shadow: 2px 3px 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
}
    .left-side{
        width: 100%;
        text-align: left;
        line-height: 1.3;
        margin-left: 15px;
        font-size: 18px;  
        font-weight: 300; 
    }
    .left-side img{
        height: 190px;
        width: 300px;
    }
    .card-content{
        width: 100%;
        text-align: left;
        line-height: 1.6;
        margin-left: 15px;
        font-size: 18px;  
        font-weight: 300;      
    }
    .buttons{
        padding-top: 50px;
        margin-left: 20px;
    }
    .buttons a button{
        padding: 20px;
        width: 40%;
        margin-left: 20px;
        font-size: 17px;
        font-weight: 700;
        border-radius: 20px;
        
    }
  .reject button{
        background-color: red;
    }
    .reject button:hover{
        opacity: 1.5;
    }
    .accept button{
        background-color: green;
    }
    
        .frame-container {
            height: 80vh;
            display: flex;
        }
        .Customer{
            padding-top: 9%;

        }

        .frame-left {
            width: 25%;
            overflow-y: hidden;
            overflow-x: hidden; /* Add this to enable scrolling if content is too long */
        }

        .frame-right {
            flex: 1; /* Take remaining width */
            overflow-y: scroll; 
            overflow-x: hidden;
        }
    </style>
</head>
<body>
<section class="section1">

        <div class="logo">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
            <h1>Welcome  <?php echo $row["Full_name"];?></h1>
                <div class="menu" id="menu">
                    <a href="Seller_products.php">Products</a>
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

    <div class="frame-container Customer">
    <div class="frame-left D-l">
        <h1>Seller Dashboard</h1>
        <a href="Sell_product.php"><button>Rent Your Product</button><br></a>
        <a href="Seller_rejected_orders.php"><button>Rejected Orders</button><br></a>
        <a href="Seller_accepted_orders.php"><button>Accepted Orders</button><br></a>
    </div>

    <div class="frame-right D-r">
        <h1>You have Following Orders:</h1>
        <?php
      $query = "SELECT orders.*, Sell_product.Product_id, Sell_product.Product_Image, c_signup.*
      FROM orders
      INNER JOIN Sell_product ON orders.Product_id = Sell_product.Product_id
      INNER JOIN c_signup ON orders.Customer_id = c_signup.Customer_id
      WHERE orders.Seller_id = $Seller_id
      AND (orders.order_status = '') -- Include orders with empty or NULL status
      ORDER BY orders.Seller_id DESC";
      
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <div class="left-side">

                        <img src="<?php echo $row['Product_Image']; ?>" alt="Card Image">
                        <p>Customer ID: <?php echo $row['Customer_id']; ?></p>
                        <p>Customer Name: <?php echo $row['Full_name']; ?></p>
                        <p>Customer Address: <?php echo $row['City_village'], "," ,$row['State'], ",",$row['District'],"," ,$row['Pin']; ?></p>
                        <p>Customer Mobile No: <?php echo $row['Mobile']; ?></p>
                        <p>Customer Email: <?php echo $row['Email']; ?></p>



                    </div>
                    <div class="card-content">
                        <p>Product ID: <?php echo $row['Product_id']; ?></p>
                        <p>Product Name: <?php echo $row['Product_name']; ?></p>
                        <p>Order Quantity: <?php echo $row['order_quantity']; ?></p>
                        
                        <p>Rent Period: <?php echo $row['order_for']; ?> Day's</p>
                        <p>Rent : <?php echo $row['rent']; ?></p>
                        <p>Total Rent: <?php echo $row['total_payable']; ?></p>
                        <!-- Add more customer information as needed -->
                        <!-- Add this inside the while loop where you display seller orders -->
                        <form action="" method="post">
                                 <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <!-- Add the order_id as a hidden input -->
                                <div class="buttons">
                                    <button type="submit" name="reject_order">Reject Order</button>
                                    <button type="submit" name="accept_order">Accept Order</button>
                                </div>
                            </form>


                    </div>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</div>

    <script src="JavaScript/Index.js"></script>
    
</body>
</html>
