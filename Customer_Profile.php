<?php 
require 'connection/config.php';
if(!empty($_SESSION['Customer_id'])){
    $Customer_id=$_SESSION['Customer_id'];
   $result= mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id=$Customer_id");
   $row= mysqli_fetch_assoc($result);
  
}
else{
    header("Location: Customer_Dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="stylesheet" href="Css/Test.css">
</head>
<body>
<div class="main_div">
        <div class="logo">
            <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div>
            <nav >
                <ul>
                    <li class="seller-wel">Welcome  <?php echo $row["Full_name"]; ?></li>                 
                <div class="icons">
                    <li><a href="Customer_Dashboard.php" id="customer-login">Home</a></li> 
                    <li><a href="logout.php" id="customer-login">Logout</a></li> 
                </div>           
                </ul>
            </nav>
        </div>
</div>
<div class="profile-cont">

    <h1>Profile</h1>
    <h3>Your Customer Id :  <?php echo $row["Customer_id"]; ?></h3>
    <h3> Name : <?php echo $row["Full_name"]; ?></h3>
    <h3> Address :</h3>
    <p>State : <?php echo $row["State"]?></p>
    <p>City /village : <?php echo $row["City_village"]?></p>
    <p>District : <?php echo $row["District"]?></p>
    <p>Pin : <?php echo $row["Pin"]?></p>
    <h3>Mobile No : <?php echo $row["Mobile"]; ?></h3>
    <h3>Email Id : <?php echo $row["Email"]; ?></h3>
    <h3 id="pass">Your Password : <?php echo $row["Password"]; ?></h3>


</div>    

  
    
</body>
</html>