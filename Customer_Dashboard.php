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
    <section class="Customer">
    <div class="D-l">
        <h1>Select Location</h1>
        <a href="#"><button>Sangli</button><br></a>
        <a href="#"><button>Kolhapur</button><br></a>
        <a href="#"><button>Solapur</button><br></a>
        <a href="#"><button>Satara</button><br></a>
    </div>
    <div class="D-r">
        <?php
       
        // Query to fetch data from the database
        $result = $conn->query("SELECT file_path, id, description FROM images");

        // Check if there are any rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <img src="<?php echo $row['file_path']; ?>" alt="Card Image">
                    <div class="card-content">
                        <h3><?php echo $row['id']; ?></h3>
                        <p><?php echo $row['description']; ?></p>
                        <a href="#" class="button">Learn More</a>
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
</section>

    <script src="JavaScript/Index.js"></script>
    
</body>
</html>