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
    <style>
        /* Existing styles... */

        /* New animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animated-section {
            animation: fadeIn 1s ease-in-out;
        }

        .animated-card {
            animation: fadeIn 1s ease-in-out;
            transition: transform 0.3s ease-in-out;
        }

        .animated-card:hover {
            transform: scale(1.05);
        }
        /* Add this to your existing styles... */

.card {
    height: 400px;  

    overflow: hidden;
    position: relative;
    transition: transform 0.3s ease-in-out;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card img {
    width: 90%;
    height: 60%;
}

.card-content {
    padding: 15px;
    text-align: center;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card:hover img {
    filter: brightness(90%);
}
.section4 h1{
    margin-top: 0;
    padding: 50px;
}

/* slider */
/* Add this to your existing styles... */

.slider-section {
    margin-top: 100px;
    display: flex;
}

.slider-info {
    flex: 1;
    padding: 20px;
}

.slider-container {
    margin-inline: 5px;
    flex: 1;
}

/* Additional styles for better aesthetics */
.card h3 {
    margin-bottom: 10px;
    font-size: 18px;
}

.card p {
    font-size: 14px;
    color: #777;
}
/* slider info */
/* Add these styles to your existing styles... */

.slider-info {
    flex: 1;
    padding: 20px;
    border-radius: 8px; /* Add rounded corners for a modern look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
}

.slider-info p {
    font-family: cursive;
    font-size: 22px;
    line-height: 2;
    color: black; /* Set text color */
}

.slider-info h1 {
    font-size: 28px;
    color: #007BFF; /* Set a bold color for the heading */
    margin-bottom: 20px; /* Add some space below the heading */
}

/* Adjust the font size, line height, and colors as needed */

/* End of additional styles for slider info */

/* Add these styles to your existing styles... */

/* New styles for slider info hover effect */


.slider-info:hover h1,
.slider-info:hover p {
    color: #333; /* Adjust the text color for better visibility on the blurred background */
}

/* End of additional styles for slider info hover effect */

        /* Loading animation styles */
#loading {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    z-index: 1000;
}

.loading-spinner {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
/* Add these styles to your existing styles... */

/* New styles for highlight section */


.highlight-symbol {
    font-size: 24px; /* Set the font size of the symbols */
    color: #007BFF; /* Set the color of the symbols */
    margin-bottom: 10px; /* Add some space below the symbols */
}

.highlight-section h2 {
    text-align: left;
    color: green;
    font-size: 18px; /* Set the font size of the points */
    margin-bottom: 20px; /* Add some space below each point */
    line-height: 1.5; /* Adjust line height for better readability */
}
/* New styles for highlight section */
.highlight-section {
    background: url('./Images/highlight.jpg') center/cover fixed; /* Replace 'your-background-image.jpg' with the path to your background image */
    padding: 50px; /* Adjust padding as needed */
    text-align: center;
    color: #fff; /* Set text color to white or any color that contrasts well with the background */
    position: relative; /* Add this for proper positioning of the content */
}

.highlight-content {
    max-width: 800px; /* Set the maximum width of the content */
    margin: 0 auto; /* Center the content */
    background-color: rgba(255, 255, 255, 0.7); /* Set the background color with transparency (adjust the last value for transparency) */
    padding: 20px; /* Adjust padding as needed */
    border-radius: 10px; /* Add rounded corners for a modern look */
}
.highlight-content h1{
    color: black;

}
/* End of new styles for highlight section */


    </style>
</head>
<body>
<div id="loading">
        <div class="loading-spinner">
            </div><br>
            <p>Please wait</p>
</div>
    <script>
    // Hide loading animation when the page is fully loaded
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("loading").style.display = "none";
    });
</script>

    
    <section class="section1">

        <div class="logo">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
                <div class="menu" id="menu">
                    <a href="#footer">About Us</a>
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

    <section class="section2 animated-section">
        <div class="s-2">
            <div class="s-2-1">
                <div class="s-2-1-1"><a href="Seller_login.php"><h1>Rent Your Farming Equipments</h1></a></div>
                <div class="s-2-1-2"><a href="Customer_login.php"><h1>Buy on Rent</h1></a></div>
            </div>
            <div class="s-2-2">
                
                <img src="Images/index.png" alt="index image">
            </div>
        </div>
    </section>

    <section class="section3 animated-section">
        <div class="s-3-1">
            <h1>Here You can give Your Equipment's on  Rent</h1>
        </div>

        <div class="equipments">
        <div class="card">
        <img src="Images/equipment_1.jpg" alt="Image 1">
        <div class="card-content">
            <h3>Sprayer</h3>
            <p>Sprayer on rent available</p>
        </div>
        </div>

        <div class="card">
        <img src="Images/equipment_2.jpg" alt="Image 2">
        <div class="card-content">
            <h3>Rotaver</h3>
            <p>Rotaver is available </p>
        </div>
        </div>

        <div class="card">
        <img src="Images/equipment_3.png" alt="Image 3">
        <div class="card-content">
            <h3>Tractor</h3>
            <p>Tractor on rent available</p>
        </div>
        </div>
        <div class="card">
        <img src="Images/equipment_4.jpg" alt="Image 3">
        <div class="card-content">
            <h3>Rotaver</h3>
            <p>Rotaver is available</p>
        </div>
        </div>
        </div>
        
    </section>
    <section class="highlight-section animated-section">
    <div class="highlight-content">
        <h1>Highlights</h1><br><br>
        <div> <h2><span   class="highlight-symbol">  &#10003; </span>  Digital Farmer-2-Farmer agri-equipment rentals and customized agri-information</h2>
        </div>
        <div> <h2><span   class="highlight-symbol">  &#10003; </span> Free of cost platform - ZERO charge to farmers and renters  </h2>
        </div>
        <div> <h2><span   class="highlight-symbol">  &#10003; </span>Enhanced income and productivity for farmers with increased utilization of idle assets </h2>
        </div>

        
    </div>
</section>


    <section class="slider-section animated-section">
    <div class="slider-info">
        <h1>Here you,</h1>
        <p>Renting your farm tools has never been easier! Our online platform simplifies the entire process, allowing you to effortlessly offer your agricultural equipment for rent. With just a few clicks, you can join our community of tool providers and connect with farmers in need. Whether you have tractors, plows, sprayers, or any other essential tools, our platform provides a convenient marketplace for you to showcase and rent out your equipment.</p>
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
        <!-- Navigation Arrows -->
        <!-- <div class="prev" onclick="changeSlide(-1)">❮</div>
        <div class="next" onclick="changeSlide(1)">❯</div> -->
    </div>
</section>
    <section class="section4 animated-section">
    <div class="s-3-1">
            <h1>Customer Feedback</h1>
    </div>
    
<div class="slider-container1">
    <div class="slider1">
        <!-- Customer Feedback Slides -->
    <div class="slide1">
	<img src="Images/feedback1.jpg" alt="Customer 2">
    <h4>Name: Vivek Kamble</h4>
            <div class="stars">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9734;</span>
            </div>
            
            <p class="message">
"User-friendly interface, seamless navigation, informative content, visually appealing design, efficient services, reliable information, responsive layout, excellent customer support."</p>
            <!-- Content of Slide 1 -->
        </div>
        <div class="slide1">
	<img src="Images/feedback2.jpg" alt="Customer 2">
    <h4>Name: Chaitanya Kashid</h4>
            <div class="stars">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
            </div>
            
            <p class="message">Outstanding quality and prompt delivery.</p>
            <!-- Content of Slide 1 -->
        </div>
        <div class="slide1">
	<img src="Images/feedback3.jpg" alt="Customer 2">
    <h4>Name: Shubham</h4>
            <div class="stars">
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
                <span>&#9733;</span>
            </div>
            
            <p class="message">Responsive customer support, timely responses.</p>
            <!-- Content of Slide 1 -->
        </div>

        <!-- Add more slides as needed -->
    </div>
    <!-- Navigation Arrows -->
    <div class="prev" onclick="changeSlide(-1)">❮</div>
    <div class="next" onclick="changeSlide(1)">❯</div>
</div>
               
    </section>
    <footer class="footer" id="footer">

        <div class="about-us">
            <h2>About Us</h2><br><br>
            <p>Welcome to our e-commerce haven! At Farma Tools Rent, we're committed to revolutionizing your shopping experience. Our vast range of quality products, seamless navigation, and secure transactions ensure you find what you need effortlessly. With a focus on customer satisfaction, we strive to make online shopping a delight. Join us on this exciting journey! <br><br>
        Contact US <br><br> Name : Vivek Kamble <br>Mobile: 7709629488<br><br> Name: Chaitanya Kashid <br> Mobile: 8208951770<br><br>Email: farmatoolsrent@gmail.com<br><br>Follow us on <br><a href="#">Instagram</a>     <a href="#">Tweeter</a>    <a href="#">Facebook</a>       </p>
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