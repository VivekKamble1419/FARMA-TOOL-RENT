<?php
require 'connection/config.php';

if (!empty($_SESSION['Customer_id'])) {
    $Customer_id = $_SESSION['Customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id=$Customer_id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: Customer_login.php");
}

// Get the selected location from the URL parameter
$selectedLocation = isset($_GET['location']) ? $_GET['location'] : null;

// Modify the SQL query based on the selected location
$query = "SELECT sell_product.*, s_signup.Full_name, City_village, State, District, Pin
          FROM sell_product
          INNER JOIN s_signup ON sell_product.Seller_id = s_signup.Seller_id";

if ($selectedLocation) {
    // Add a condition to filter by District
    $query .= " WHERE s_signup.District = '$selectedLocation'";
}

$query .= " ORDER BY sell_product.Seller_id DESC";

$result = $conn->query($query);
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
            overflow: hidden;
        }
        .card img {
            margin: 5%;
            width: 70%;
             height: 55%;
        }
        .card {
                margin: auto;
                width: 26%;
                height: 380px;  
                margin: 30px;
                padding-bottom: 1%;
                display: inline-block;
                box-shadow: 2px 3px 4px 8px rgba(0, 0, 0, 0.1);
                text-align: center;
}
#show-all button{
    background-color: #e8de6d;
}
        .frame-container {
            height: 70vh;
            display: flex;
        }
        .Customer{
            padding-top: 22vh;

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
<body>
<section class="section1">
        <div class="logo">
            <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
            <h1>Welcome  <?php echo $customerRow["Full_name"];?></h1>
            <div class="menu" id="menu">
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

    <div class="frame-container Customer">
        <div class="frame-left D-l">
            <h1>Select Location</h1>
            <a href="Customer_dashboard.php" id="show-all"><button>Show All</button></a>
            <a href="Customer_dashboard.php?location=Sangli"><button>Sangli</button></a>
            <a href="Customer_dashboard.php?location=Kolhapur"><button>Kolhapur</button></a>
            <a href="Customer_dashboard.php?location=Solapur"><button>Solapur</button></a>
            <a href="Customer_dashboard.php?location=Satara"><button>Satara</button></a>
        </div>
    
        <div class="frame-right D-r">
            <?php
            if ($result->num_rows > 0) {
                while ($productRow = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <img src="<?php echo $productRow['Product_Image']; ?>" alt="Card Image">
                        <div class="card-content">
                            <p><?php echo $productRow['Product_name']; ?></p>
                            <p>Seller: <?php echo $productRow['Full_name']; ?></p>
                            <p><?php echo $productRow['State'], ", ", $productRow['District'], ", ", $productRow['Pin']; ?></p>
                            <a href="Product_more_details.php?product_id=<?php echo urlencode($productRow['product_id']); ?>" class="button">More details</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "Sorry,  No results Found for Your Search......!";
            }

            // Close connection
            $conn->close();
            ?>
        </div>
    </div>


    <script src="JavaScript/Index.js"></script>
    
</body>
</html>