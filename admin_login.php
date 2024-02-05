<?php 
require 'connection/config.php';
if(isset($_POST["submit"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $result= mysqli_query($conn, "SELECT * FROM admins WHERE username ='$username'");
    $row = mysqli_fetch_array($result);
    if(mysqli_num_rows($result)>0){
        if($password == $row["password"]){
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: admin_dashboard.php");
            
        }
        else{
            echo
    "<script> alert('Wrong Password.');</script>";
        }
    }
    else{
        echo
    "<script> alert('User not Ragistard.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            height: 350px;
            display: flex;
            max-width: 800px;
            width: 100%;
            background-color: #3498db; /* Attractive background color */
            box-shadow: 1px 1px 20px 20px gray;
            border-radius: 10px;
            overflow: hidden;
        }

        .login-text, .login-form {
            flex: 1;
            padding: 20px;
        }
        .login-text {
    font-size: 20px;
    font-weight: 500;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #fff;
    animation: glowing 2s infinite; /* Add the glowing animation */
}

@keyframes glowing {
    0% {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }
    50% {
        text-shadow: 0 0 20px rgba(255, 255, 255, 0.8),
                     0 0 30px rgba(255, 255, 255, 0.8);
    }
    100% {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.8);
    }
}


        .login-form {
            background-color: #fff;
            border-radius: 0 10px 10px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-size: 18px;
            font-weight: 500;
            padding-block: 10px;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button{
            margin-top: 30px;
            font-size: 18px;
            font-weight: 500;
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 20px;
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        @media screen and (max-width: 600px) {
            .login-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-text">
            <h2>Admin Login</h2>
        </div>
        <div class="login-form">
            <form action="" method="post" autocomplete="off"> 
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit" name="submit">Login</button>

            </form>
        </div>
    </div>
</body>
</html>
