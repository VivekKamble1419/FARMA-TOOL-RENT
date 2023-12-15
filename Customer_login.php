<?php 
require 'config.php';
if(isset($_POST["submit"])){
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
    $result= mysqli_query($conn, "SELECT * FROM c_signup WHERE EMAIL ='$Email'");
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0){
        if($Password == $row["Password"]){
            $_SESSION["login"]=true;
            $_SESSION["Customer_id"]=$row["Customer_id"];
            header("Location: Customer_Dashboard.php");

        }
        else{
            echo
    "<script> alert('Wrong Password...!');</script>";
        }

    }
    else{
        echo
    "<script> alert('User not Ragistard');</script>";
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
</head>
<body>
    <h1>Customer Login</h1>
    <p>Dont have an Account yet? <span><a href="Customer_ragistration.php">Sign Up</a></span></p>
    <form class="" action="" method="post" autocomplete="off">
        <label for="Email">Email :</label>
        <input type="text" name="Email" id="Email" required value="" ><br>

        
        <label for="Password">Password :</label>
        <input type="password" name="Password" id="Password" required value="" ><br>
        
        <button type="submit" name="submit">Login</button>
        
    </form>
    
</body>
</html>