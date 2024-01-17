<?php 
require 'connection/config.php';
if(!empty($_SESSION['Customer_id'])){
    $Customer_id=$_SESSION['Customer_id'];
    $result= mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id=$Customer_id");
    $row= mysqli_fetch_assoc($result);
}
else{
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
            overflow: hidden;
        }
        .card img {
            margin: 5%;
            width: 70%;
             height: 60%;
        }
        .card {
    margin: auto;
    width: 25%;
    height: 350px;  
    margin: 30px;
    padding-bottom: 1%;
    display: inline-block;
    box-shadow: 2px 3px 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

        .frame-container {
            height: 70vh;
            display: flex;
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
            <h1>Welcome  <?php echo $row["Full_name"];?></h1>
                <div class="menu" id="menu">
                    <a href="#">Orders</a>
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
            <!-- Your left frame content here -->
            <h1>Select Location</h1>
            <a href="#"><button>Sangli</button><br></a>
            <a href="#"><button>Kolhapur</button><br></a>
            <a href="#"><button>Solapur</button><br></a>
            <a href="#"><button>Satara</button><br></a>
        </div>
 
    <div class="frame-right D-r">
           
        <?php
    
        $query = "SELECT sell_product.*, s_signup.Full_name,City_village,State,District,Pin
          FROM sell_product
          INNER JOIN s_signup ON sell_product.Seller_id = s_signup.Seller_id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <img src="<?php echo $row['Product_Image']; ?>" alt="Card Image">
                    <div class="card-content">
                        <p><?php echo $row['Product_name']; ?></p>
                        <p>Seller: <?php echo $row['Full_name']; ?></p>
                        <p><?php echo $row['State'], ",",$row['District'],"," ,$row['Pin']; ?></p>

                        <a href="#" class="button">More details</a>
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