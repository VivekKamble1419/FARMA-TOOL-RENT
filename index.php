<?php
require 'connection/config.php';

if (isset($_POST["submit"])) {
    $Name = $_POST["name"];
    $Email = $_POST["email"];
    $Message = $_POST["message"];
    
    // Corrected mysqli_query statement
    mysqli_query($conn, "INSERT INTO feedback (Name, Email, Message) VALUES ('$Name', '$Email', '$Message')");
    
    // Display JavaScript alert
    echo "<script>alert('Feedback submitted successfully');</script>";
    
    // Redirect to a new page after displaying the alert
    echo "<script>window.location.href='index.php';</script>";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farma Tools Rent</title>
    <link rel="stylesheet" href="Css/Index.css">
</head>
<body>
    <section class="section1">

        <div class="logo">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
                <div class="menu" id="menu">
                    <a href="#">About Us</a>
                    <a href="Customer_login.php">Customer Login</a>
                    <a href="Seller_login.php">Seller Login</a>
                    <!-- <a href="#">Create Account</a> -->
                <div class="dropdown">
                    <button class="dropbtn">Create Account
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="Customer_ragistration.php">Customer Signup</a>
                        <a href="Seller_ragistration.php">Seller Signup</a>
                    </div>
                </div>
                </div>
                <div class="icon" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
    </section>

    <section class="section2">
        <div class="s-2">
            <div class="s-2-1">
                <div class="s-2-1-1"><a href="#"><h1>Rent Your Farming Equipments</h1></a></div>
                <div class="s-2-1-2"><a href="#"><h1>Buy on Rent</h1></a></div>
            </div>
            <div class="s-2-2">
                
                <img src="Images/index.png" alt="index image">
            </div>
        </div>
    </section>

    <section class="section3">
        <div class="s-3-1">
            <h1>Here You can give Your Equipment's on  Rent</h1>
        </div>

        <div class="equipments">
        <div class="card">
        <img src="Images/equipment_1.jpg" alt="Image 1">
        <div class="card-content">
            <h3>Card 1</h3>
            <p>This is some text for Card 1.</p>
        </div>
        </div>

        <div class="card">
        <img src="Images/equipment_2.jpg" alt="Image 2">
        <div class="card-content">
            <h3>Card 2</h3>
            <p>This is some text for Card 2.</p>
        </div>
        </div>

        <div class="card">
        <img src="Images/equipment_3.png" alt="Image 3">
        <div class="card-content">
            <h3>Card 3</h3>
            <p>This is some text for Card 3.</p>
        </div>
        </div>
        <div class="card">
        <img src="Images/equipment_4.jpg" alt="Image 3">
        <div class="card-content">
            <h3>Card 3</h3>
            <p>This is some text for Card 3.</p>
        </div>
        </div>
        </div>
        <div class="slider-container">

        <div class="slider">
            <div class="slides">
                <?php
                // Replace "Images/" with the path to your image folder
                $imageFolder = "Slider_images/";
                $Images = glob($imageFolder . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);

                foreach ($Images as $Image) {
                    echo "<div class='slide'><img src='$Image' alt='Image'></div>";
                }
                ?>
                
            </div>
        </div>
        </div>
    </section>
    <section class="section4">
    <div class="s-3-1">
            <h1>Customer Feedback</h1>
    </div>
    
<div class="slider-container1">
    <div class="slider1">
        <!-- Customer Feedback Slides -->
    <div class="slide1">
	<img src="Images/login_page_img2.png" alt="Customer 2">
    <h4>Name: Vivek Kamble</h4>
            <div class="stars">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
            </div>
            
            <p class="message">Outstanding quality and prompt delivery.</p>
            <!-- Content of Slide 1 -->
        </div>
        <div class="slide1">
	<img src="Images/login_page_img2.png" alt="Customer 2">
    <h4>Name: Vivek Kamble</h4>
            <div class="stars">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
            </div>
            
            <p class="message">Outstanding quality and prompt delivery.</p>
            <!-- Content of Slide 1 -->
        </div>
        <div class="slide1">
	<img src="Images/login_page_img2.png" alt="Customer 2">
    <h4>Name: Vivek Kamble</h4>
            <div class="stars">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
                <span>&#9734;</span>
            </div>
            
            <p class="message">Outstanding quality and prompt delivery.</p>
            <!-- Content of Slide 1 -->
        </div>

        <!-- Add more slides as needed -->
    </div>
    <!-- Navigation Arrows -->
    <div class="prev" onclick="changeSlide(-1)">❮</div>
    <div class="next" onclick="changeSlide(1)">❯</div>
</div>
               
    </section>
    <footer class="footer">

        <div class="about-us">
            <h2>About Us</h2>
            <p>Your about us content goes here. Provide a brief description of your company or organization.</p>
        </div>
       

        <div class="feedback-form">
            <h2>Feedback Form</h2>
            <form id="feedbackForm" action="index.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>

               <button type="submit" name="submit">Submit Feedback</button>
            </form>
        </div>
    </footer>
    





    <script src="JavaScript/Index.js"></script>

</body>
</html>