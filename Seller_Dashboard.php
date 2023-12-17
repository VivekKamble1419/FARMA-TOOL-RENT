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
</head>
<body>


    <h3>Welcome <?php echo $row["Email"]; ?></h3>
    <a href="Seller_Profile.php">

<button>Seller Profile</button>
</a>
    <a href="logout.php">Logout</a>
    
</body>
</html>