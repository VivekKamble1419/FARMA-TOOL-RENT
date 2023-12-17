<?php 
require 'connection/config.php';
if(isset($_POST["submit"])){
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
    $result= mysqli_query($conn, "SELECT * FROM s_signup WHERE EMAIL ='$Email'");
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0){
        if($Password == $row["Password"]){
            $_SESSION["login"]=true;
            $_SESSION["Seller_id"]=$row["Seller_id"];
            header("Location: Seller_Dashboard.php");
            
        }
        else{
            echo
    "<script> alert('Wrong Password.');</script>";
        }
    }
    else{
        echo
    "<script> alert('Seller not Ragistard.');</script>";
    }
}
?>

<!-- Seller login Start -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login</title>
    <link rel="stylesheet" href="./Css/Style.css">
</head>
<body>
    <div class="login-background">
        <div class="login-container">
            <div class="login-image">
                <img src="./Images/login_page_img3.png" alt="login image">
            </div>

        <div class="login-form">
        <div class="login-card">
        <h1>Seller Login</h1>
        <p>Don't have an Account yet? <span><a href="Seller_ragistration.php">Sign Up</a></span></p>
    
        <form class="" action="" method="post" autocomplete="off"> 
        <label for="Email">Email Id </label><br>
        <input type="text" name="Email" id="Email" required value="" ><br>
        
        <label for="Password">Password </label><br>
        <input type="password" name="Password" id="Password" required value="" ><br>
        <br><div class="login-btn">

            <button type="submit" name="submit">Login</button>
        </div>        
        
         </form>
        </div>
        </div>
    </div>
    </div>   
</body>
</html>