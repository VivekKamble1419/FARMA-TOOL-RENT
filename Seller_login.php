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
<!-- Seller login Start -->
<!-- Seller login Start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Login</title>
    <link rel="stylesheet" href="./Css/Style.css">
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Pacifico&display=swap');

                body {
            font-family: 'Pacifico', cursive;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .login-background {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            font-family: 'Pacifico', cursive;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            max-width: 90%;
            margin: 0 auto;
            padding: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            font-size: 2em;
            animation: bounce 1s ease infinite;
        }

        .login-image img {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
        }

        .login-card {
            padding: 20px;
            animation: slideIn 1s ease-in-out;
        }

        .heading {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .heading a {
            color: black;
            font-size: 25px;
            transition: opacity 0.5s ease;
        }

       
        .heading a:hover {
            color: red;
        }

        input,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-20px);
            }
            60% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>
<body>
    <div class="login-background">
        <div class="login-container">
            <div class="login-image">
                <img src="./Images/login_page_img3.png" alt="login image">
            </div>

            <div class="login-form">
                <div class="login-card">
                    <div class="heading">
                        <h1>Seller Login</h1>
                        <a class="cancel-btn" href="index.php">&#x2716;</a>
                    </div>
                    <p>Don't have an Account yet? <span><a href="Seller_ragistration.php">Sign Up</a></span></p>
                    
                    <form class="" action="" method="post" autocomplete="off"> 
                        <label for="Email">Email Id </label><br>
                        <input type="text" name="Email" id="Email" required value=""><br>
                        
                        <label for="Password">Password </label><br>
                        <input type="password" name="Password" id="Password" required value=""><br>
                        <br>
                        <div class="login-btn">
                            <button type="submit" name="submit">Login</button>
                        </div>        
                    </form>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
