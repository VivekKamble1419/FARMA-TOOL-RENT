<?php
require './connection/config.php';

if (isset($_POST["submit"])) {
    $Product_name = $_POST["Product_name"];
    $available_qantity = $_POST["available_qantity"];
    $rent = $_POST["rent"];
    $product_quality = $_POST["product_quality"];
    $product_discription = $_POST["product_discription"];


    // Check if the user is logged in
    if (isset($_SESSION['Seller_id'])) {
        $Seller_id = $_SESSION['Seller_id'];  // Get the user ID from the session

        // Retrieve the Seller_id from the 'sellers' table using the user_id
        $query = "SELECT Seller_id FROM s_signup WHERE Seller_id = '$Seller_id'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Seller_id = $row['Seller_id'];
        } else {
            echo "<script>alert('Seller ID not found');</script>";
            exit;  // Stop further execution
        }
    } else {
        // Handle the case where the user is not logged in
        echo "<script>alert('User not logged in');</script>";
        exit;  // Stop further execution
    }

    if ($_FILES["image"]["error"] === 4) {
        echo "<script>alert('Image not selected');</script>";
    } else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($imageExtension, $validImageExtensions)) {
            echo "<script>alert('Invalid image format');</script>";
        } else if ($fileSize > 1000000) {
            echo "<script>alert('Image size is too large');</script>";
        } else {
            $newImageName = uniqid() . '.' . $imageExtension;
            $uploadPath = 'upload/' . $newImageName;  // Initialize $uploadPath

            move_uploaded_file($tmpName, $uploadPath);

            $query = "INSERT INTO sell_product (Seller_id, Product_Image, Product_name, available_qantity, rent, product_quality, product_discription) VALUES ('$Seller_id', '$uploadPath', '$Product_name', '$available_qantity', '$rent', '$product_quality', '$product_discription')";

            mysqli_query($conn, $query);

            echo "<script>alert('Item Added Sucessfuly...'); document.location.href='./Seller_Dashboard.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="./Css/Style2.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .rag-form {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 1000px;
            text-align: center;
        }

        h3 {
            color: #333;
        }

        form {
            display: inline-block;
        }

        label {
            line-height: 70px;
            font-weight: bold;
        }

        input,
        select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 70%;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .cancle button {
            margin-top: 20px;
            background-color: #ccc;
            color: #333;
        }

        .cancle button:hover {
            background-color: #bbb;
        }
    </style>
</head>
<body>
    <div class="rag-form">
    <h3>Add Product</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="image">Choose an image:</label>
        <input type="file" name="image" id="image" accept="image/*" required><br>
        
        <label for="Product_name">Product Name:</label>
        <input name="Product_name" id="Product_name" rows="4" required></input><br>

        <label for="available_qantity">Available Quantity :</label>
        <select name="available_qantity" id="available_qantity"  required>
                <option value="">Not selected</option>
                <option value="1" id="1">1 </option>
                <option value="2" id="2">2 </option>
                <option value="3" id="3">3 </option>
                <option value="3" id="4">4 </option>
                <option value="5" id="5">5 </option>
                <option value="6" id="6">6 </option>
                <option value="7" id="7">7 </option>
                <option value="8" id="8">8 </option>
                <option value="9" id="9">9 </option>
                <option value="10" id="10">10</option>
       </select> <br>
        <label for="rent">Rent in Rupees:</label>
        <input type="number" name="rent" id="rent"  required></input><br>

        <label for="product_quality">Product Quality :</label>
        <select name="product_quality" id="product_quality"  required>
                <option value="">Not selected</option>
                <option value="excellent " id="excellent ">Excellent  </option>
                <option value="better " id="better ">Better  </option>
                <option value="good " id="good ">Good  </option>
                <option value="average " id="average ">Average  </option>
                <option value="bad " id="bad ">Bad  </option>
                
       </select> 
       <label for="product_discription">Product discription:</label>
        <input type="textarea" name="product_discription" id="product_discription"  required></input>

        
        <button type="submit" name="submit" value="Upload">Add Item</button>
        
        <a href="Seller_Dashboard.php" class="cancle">
            <button type="button" name="cancle" id="cancle">Cancle</button>
        </a> 


    </form>
    </div>
</body>
</html>
