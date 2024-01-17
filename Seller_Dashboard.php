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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Dashboard</title>
    <link rel="stylesheet" href="Css/Index2.css">
    
<style>
      body {
            margin: 0;
            padding: 0;
            overflow: hidden;
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
</head>
<body>
<section class="section1">

        <div class="logo">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
            <h1>Welcome  <?php echo $row["Full_name"];?></h1>
                <div class="menu" id="menu">
                    <a href="#">Products</a>
                    <a href="Seller_Profile.php">Profile</a>
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
        </div>
 
    <div class="frame-right D-r">
         <div class="product-card">
            <div class="image-other"></div>
            <div class="details"></div>
         </div>  
    <h1>Welcome  <?php echo $row["Full_name"];?></h1>
           
          
     
    </div>
    </div>
    <script src="JavaScript/Index.js"></script>
    
</body>
</html>
