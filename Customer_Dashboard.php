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
</head>
<body>


    <h3>Welcome <?php echo $row["Email"]; ?></h3>
    <a href="logout.php">Logout</a>
    
</body>
</html>