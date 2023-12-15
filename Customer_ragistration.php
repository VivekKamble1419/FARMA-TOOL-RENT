<?php 
require './connection/config.php';
if(isset($_POST["submit"])){
 $Full_name = $_POST["Full_name"];   
 $City_village = $_POST["City_village"];   
 $State = $_POST["State"];   
 $District = $_POST["District"];   
 $Pin = $_POST["Pin"];   
 $Mobile = $_POST["Mobile"];   
 $Email = $_POST["Email"];   
 $Password = $_POST["Password"];   
 $Repassword = $_POST["Repassword"];   

$duplicate = mysqli_query($conn, "SELECT * FROM c_signup WHERE email= '$Email' ");
if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Email Has Already Taken');</script>";
}
else{
    if($Password == $Repassword){
        $query = "INSERT INTO c_signup VALUES('','$Full_name','$City_village','$State','$District','$Pin','$Mobile','$Email','$Password','$Repassword')";
        mysqli_query($conn,$query);
        echo
        "<script> alert('Ragistration Sussefully');</script>";
    }
    else{
        echo
        "<script> alert('Password doesnot match');</script>";
    }
    
}

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Ragistration</title>
</head>
<body>

    <h3>Customer Sign Up</h3>
    <form class="" action="" method="post" autocomplete="off">
        <label for="Full_name">Full name :</label>
        <input type="text" name="Full_name" id="Full_name" required value="" ><br>

        <label for="">Address :</label><br>
        <label for="City_village">City /village :</label>
        <input type="text" name="City_village" id="City_village" required value="" ><br>

        <label for="State">State :</label>
        <input type="text" name="State" id="State" required value="" ><br>

        <label for="District">District :</label>
        <input type="text" name="District" id="District" required value="" ><br>

        <label for="Pin">Pin :</label>
        <input type="text" name="Pin" id="Pin" required value="" ><br>

        <label for="Mobile">Mobile :</label>
        <input type="text" name="Mobile" id="Mobile" required value="" ><br>

        <label for="Email">Email :</label>
        <input type="email" name="Email" id="Email" required value="" ><br>

        <label for="Password">Password :</label>
        <input type="password" name="Password" id="Password" required="" value="" ><br>

        <label for="Repassword">Repassword :</label>
        <input type="password" name="Repassword" id="Repassword" required="" value=""><br>

        
        <button type="submit" name="submit">Ragister</button>
    </form>
    
    
    <a href="Customer_login.php">Customer Login</a>
    
</body>
</html>