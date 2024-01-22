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
     
    

    <script src="JavaScript/Index.js"></script>
    
</body>
</html>