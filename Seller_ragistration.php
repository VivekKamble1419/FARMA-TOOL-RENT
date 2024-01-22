<?php 
require 'connection/config.php';
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

$duplicate = mysqli_query($conn, "SELECT * FROM s_signup WHERE email= '$Email' ");
if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Email Has Already Taken');</script>";
}
else{
    if($Password == $Repassword){
        $query = "INSERT INTO s_signup VALUES('','$Full_name','$City_village','$State','$District','$Pin','$Mobile','$Email','$Password','$Repassword')";
        mysqli_query($conn,$query);
        echo
        "<script> alert('Registration Sussefully');</script>";
     // Redirect to a new page after displaying the alert
         echo "<script>window.location.href='index.php';</script>";
        exit();

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
    <title>Seller Registration</title>
    <link rel="stylesheet" href="./Css/ragistration.css">
</head>
<body>
    <div class="rag-form">
    <h3>Seller Sign Up</h3>
    <form class="" action="" method="post" autocomplete="off">
        <label for="Full_name" class="full-name">Full name :</label>
        <input type="text" name="Full_name" id="Full_name" required value="" ><br>

        <label for="">Address </label><br>
        <label for="City_village">City /village :</label>
        <input type="text" name="City_village" id="City_village" required value="" >

        <label for="State">State :</label>
        <select name="State" id="State"  required>
                <option value="">Not selected</option>
                <option value="Maharashtra" id="State">Maharashtra</option>
        </select>
<br>
        <label for="District">District :</label>
        <select name="District" id="District"  required>
                <option value="">Not selected</option>
                <option value="Sangli" id="District">Sangli</option>
                <option value="Kolhapur" id="District">Kolhapur</option>
                <option value="Solapur" id="District">Solapur</option>
                <option value="Satara" id="District">Satara</option>
        </select>

        <label for="Pin">Pin :</label>
        <input type="text" name="Pin" id="Pin" required value="" ><br>

        <label for="Mobile">Mobile :</label>
        <input type="text" name="Mobile" id="Mobile" required value="" >

        <label for="Email">Email :</label>
        <input type="email" name="Email" id="Email" required value="" ><br>

        <label for="Password">Password :</label>
        <input type="password" name="Password" id="Password" required="" value="" >

        <label for="Repassword">Repassword :</label>
        <input type="password" name="Repassword" id="Repassword" required="" value=""><br>
    
        <a href="index.php" class="cancle">
            <button type="button" name="cancle" id="cancle">Cancle</button>
        </a>  
        <button type="submit" name="submit" id="register">Register</button>
      
    </form>   
    </div>
</body>
</html>