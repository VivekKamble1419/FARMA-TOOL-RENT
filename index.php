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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">

    <link rel="stylesheet" href="Css/chat_bot.css">
    
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


@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
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



<button class="chatbot-toggler">
        <span class="material-symbols-outlined">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
<div class="chatbot">
    <header>
        <h2>Tell us any problem</h2>
        <span class="close-btn material-symbols-outlined">close</span>

    </header>
    <ul class="chatbox">
        <li class="chat incoming">
            <span class="material-symbols-outlined">Smart_toy</span>
            <p>chat bot Here, 👋<br> How Can I help You today?</p>
        </li>
       
    </ul>

    <div class="chat-input">
        <textarea placeholder="Enter a message....." required></textarea>
        <span id="send-btn" class="material-symbols-outlined ">send</span>
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

//all code is based on open ai

const chatInput= document.querySelector(".chat-input textarea");
const sendChatBtn= document.querySelector(".chat-input span");
const chatbox= document.querySelector(".chatbox");
const chatbotToggler= document.querySelector(".chatbot-toggler");
const chatbotcloseBtn= document.querySelector(".close-btn");




let userMessage;
const API_KEY ="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";
const inputInHeight= chatInput.scrollHeight;
    //reflacts user message to outgoing box
const createChatLi = (message, className) => {
    const chatli = document.createElement("li");
    chatli.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">Smart_toy</span><p></p>`;
    chatli.innerHTML = chatContent;
    chatli.querySelector("p").textContent=message;
    return chatli;
  }

  const genrateResponce = (incomingChatli) => {
    const API_URL = "https://api.openai.com/v1/chat/completions";
    const messageElement = incomingChatli.querySelector("p");

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "gpt-3.5-turbo",
            messages: [{ role: "user", content: userMessage }]
        })
    };

    // send post request to api
    fetch(API_URL, requestOptions)
        .then(res => {
            if (!res.ok) {
                throw new Error(`HTTP error! Status: ${res.status}`);
            }
            return res.json();
        })
        .then(data => {
            messageElement.textContent = data.choices[0].message.content;
        })
        .catch(error => {
            messageElement.classList.add("error");
            messageElement.textContent = "Oops! Something went wrong. Please try again.";
            console.error(error);
        })
        .finally(() => chatbox.scrollTo(0, chatbox.scrollHeight));
};



const handlechat=()=>{
    userMessage = chatInput.value.trim();
    if(!userMessage) return;
    chatInput.value ="";
    chatInput.style.height=`${inputInHeight}px`


    //reflacts user message to chat box
    chatbox.appendChild(createChatLi(userMessage,"outgoing"));
    chatbox.scrollTo(0,chatbox.scrollHeight);
    // console.log(userMessage);

    setTimeout(()=>{
        const incomingChatli=createChatLi("Iam is Thinking...","incoming")
    chatbox.appendChild(incomingChatli);
    chatbox.scrollTo(0,chatbox.scrollHeight);

    genrateResponce(incomingChatli);
        
    },600);
}

chatInput.addEventListener("input", ()=>{
    chatInput.style.height=`${inputInHeight}px`
    chatInput.style.height=`${chatInput.scrollHeight}px`
});

chatInput.addEventListener("keydown", (e)=>{
    if(e.key === "Enter" && ! e.shiftKey && window.innerWidth > 800){
        e.preventDefault();
        handlechat();
    }
});
sendChatBtn.addEventListener("click",handlechat);
chatbotToggler.addEventListener("click",()=>document.body.classList.toggle("show-chatbot"));
chatbotcloseBtn.addEventListener("click",()=>document.body.classList.remove("show-chatbot"));


</script>

    <script src="JavaScript/Index.js"></script>

</body>
</html>