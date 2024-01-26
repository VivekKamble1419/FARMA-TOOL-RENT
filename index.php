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
    font-size: 20px;
    font-weight: 300;
    line-height: 1.7;
    color: black; /* Set text color */
}

.slider-info h1 {
    font-size: 28px;
    color: black; /* Set a bold color for the heading */
    margin-bottom: 20px; /* Add some space below the heading */
}

/* Additional styles for slider section */
.slider-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 50px;
}

.slider-info,
.slider-container {
    flex: 1;
}

.slider-info {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.slider-container {
    margin-left: 20px;
    overflow: hidden;
    position: relative;
}

.slider {
    display: flex;
    transition: transform 0.9s ease-in-out;
}

.slide {
    flex: 0 0 100%;
}




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
/* Add this to your CSS */
/* Add this to your CSS */
@keyframes fadeInFooter {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.footer {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    background-color: #333;
    color: #fff;
    flex-wrap: wrap;
    animation: fadeInFooter 1s ease-in-out; /* Apply the fade-in animation */
}

.footer-column {
    flex: 0 0 30%; /* Adjust the width as needed */
    box-sizing: border-box;
    padding: 20px;
    margin-bottom: 20px; /* Add some margin between columns */

}

.footer-social-media {
    flex: 100%;
    margin-top: 20px;
    text-align: center;
}
/* Add this to your existing styles... */

.social-icon {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
    position: relative;
}

.social-icon:hover {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #007BFF;
}

.social-icon:hover::before {
    opacity: 1;
}


.social-icon {
    color: #fff;
    text-decoration: none;
    margin: 0 10px;
}

.footer-copyright {
    flex: 100%;
    text-align: center;
    margin-top: 20px;
}


.footer-column.site-map h2 {
    margin-bottom: 20px; /* Add some space below the heading */
}

.footer-column.site-map ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column.site-map ul li {
    margin-bottom: 10px;
}

.footer-column.site-map a {
    color: white; /* Set link color */
    text-decoration: none;
    transition: color 0.3s ease-in-out; /* Add a smooth transition effect for color changes */
}

.footer-column.site-map a:hover {
    color: #e74c3c; /* Change the color on hover */
}
/* Add this to your existing styles... */

/* Footer hover underline animation */
.footer-column h2 {
    position: relative;
    cursor: pointer;
    margin-bottom: 30px;
    transition: color 0.3s ease-in-out; /* Add a smooth transition effect for color changes */
}

.footer-column h2:hover {
    color: #e74c3c; /* Change the color on hover */
}

.footer-column h2::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #e74c3c; /* Set the underline color */
    transition: width 0.3s ease-in-out; /* Add a smooth transition effect for width changes */
}

.footer-column h2:hover::before {
    width: 100%;
}
/* Add this to your existing styles... */

/* Chat button styles */
.chat-button {
  position: fixed;
  bottom: 10px;
  right: 20px;
  background-color: transparent;
  border: none;
  padding: 0;
  cursor: pointer;
  z-index: 1001; /* Place the chat button above the other elements */
}

.chat-button img{
    height: 140px;
    width: 140px;
}

/* Chat popup styles */
.chat-popup {
    margin-bottom: 80px;
  display: none;
  position: fixed;
  bottom: 80px;
  right: 20px;
  width: 400px;
  height: 450px;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 5px;
  z-index: 1000; /* Place the chat popup below the chat button */
}

.chat-popup-content {
  padding: 10px;
  text-align: center;
}

/* Show/hide animation for chat popup */
.chat-popup.show {
  display: block;
  animation: fadeIn 0.5s ease-in-out;
}
.chat-popup-content h1 {
  background-color: #ccc;
  font-family: cursive;
  padding: 10px;
  text-align: center;
  position: sticky;
  top: 0; /* Stick to the top */
  z-index: 1; /* Ensure it's above other elements */
}
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

/* Add this to your existing styles... */

/* Chat message styles */
.chat-message {
  padding: 10px;
  margin: 10px;
  border-radius: 5px;
  max-width: 70%;
}

.bot {
  background-color: #007BFF;
  color: #fff;
  align-self: flex-start;
}

.user {
  background-color: #eee;
  color: #333;
  align-self: flex-end;
}

/* Add this to your existing styles... */

/* Chat input and messages styles */
.chat-popup-content {
  display: flex;
  flex-direction: column;
  height: 100%;
}

.chat-messages {
  flex-grow: 1;
  overflow-y: auto;
}

.chat-input {
  display: flex;
  align-items: center;
  margin-top: 10px;
}

.chat-input input {
  flex-grow: 1;
  padding: 8px;
  margin-right: 5px;
  
}

.chat-input button {
  padding: 8px 15px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Ensure the chat messages scroll to the latest message */
#chatMessages {
  overflow-y: auto;
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
                    <a href="About_us.php">About Us</a>
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



<div id="chatButton" class="chat-button" onclick="toggleChatPopup()">
  <img src="./Images/chatbot2.gif" alt="Chat Icon">
</div>
<div id="chatPopup" class="chat-popup">
   
  <div class="chat-popup-content">

    <!-- Add your chat content here -->
    <div class="chat-messages" id="chatMessages">
    <h1 style="background-color: #ccc; font-family: cursive; padding: 10px; text-align:center;">Farm Tools Rent</h1>
    <div class="chat-message bot">Hello! I'm Farma Tools Rent Chatbot. How can I assist you today?</div>
      <div class="chat-message bot">Hello! I'm Farma Tools Rent Chatbot. How can I assist you today?</div>
      <div class="chat-message user">Hi there! I'm interested in renting farming equipment.</div>
      <div class="chat-message bot">Great! We have a variety of equipment available. What specific equipment are you looking for?</div>
      <div class="chat-message user">I need a tractor for plowing my fields.</div>
      <div class="chat-message bot">Sure, we have tractors available for rent. Could you please provide your location so that I can find the nearest options for you?</div>
      
      <!-- Add more chat messages as needed -->
    </div>
    <div class="chat-input">
      <input type="text" id="userMessage" placeholder="Type your message...">
      <button>Send</button>
    </div>
  </div>
</div>




   <!-- Add this to your HTML structure -->
<footer class="footer" id="footer">
    <div class="footer-column contact-info">
        <h2>Contact Information</h2>
        <p>
            Name: Vivek Kamble <br>
            Mobile: 7709629488 <br>
            <br>
            Name: Chaitanya Kashid <br>
            Mobile: 8208951770 <br>
            <br>
            Email: farmatoolsrent@gmail.com
        </p>
    </div>

    <div class="footer-column site-map">
        <h2>Site Map</h2>
        <ul>
            <li><a href="About_us.php">About Us</a></li>
            <li><a href="Customer_login.php">Customer Login</a></li>
            <li><a href="Seller_login.php">Seller Login</a></li>
            <li><a href="Customer_ragistration.php">Customer Signup</a></li>
            <li><a href="Seller_ragistration.php">Seller Signup</a></li>
            <!-- Add more links as needed -->
        </ul>
    </div>

    <div class="footer-column feedback-form">
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

    <div class="footer-social-media">
       <!-- Update your social media links in the footer... -->

<a href="#" class="social-icon" >WhatsApp</a>
<a href="#" class="social-icon" >Facebook</a>
<a href="#" class="social-icon" >Twitter</a>
<a href="#" class="social-icon" >Instagram</a>
<a href="#" class="social-icon" >YouTube</a>

    </div>

    <div class="footer-copyright">
        <p>&copy; 2024 Farma Tools Rent. All rights reserved.</p>
    </div>
</footer>


<script>
    // Add this to your existing JavaScript...
function toggleChatPopup() {
  var chatPopup = document.getElementById('chatPopup');
  chatPopup.classList.toggle('show');
}

</script>

    <script src="JavaScript/Index.js"></script>

</body>
</html>