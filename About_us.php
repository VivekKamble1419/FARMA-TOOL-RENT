
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farma Tools Rent</title>
    <link rel="stylesheet" href="Css/Index.css">
    <style>
  


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

.container section {
            padding: 20px;
            height: 100%;
            overflow: hidden;
            transition: max-height 0.5s ease-in-out;
        }

        section.open {
            max-height: 1000px; /* Adjust this value as needed */
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
        }

        p {
            line-height: 2;
            color: #555;
        }

        .container {
            width:80%;
            padding: 50px;
            padding-top: 10%;
            margin: 0 auto;
        }
       /* Modify the symbol styles... */
       .content ul {
            list-style: none;
            padding: 0;
        }

        .content ul li {
            text-decoration: none;
            position: relative;
            padding-left: 60px;
            margin-bottom: 10px;
        }

        .content ul li .highlight-symbol {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            color: green;
            font-size: 20px;
            font-weight: 900;
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
        }

        .content ul li span {
            margin-left: 30px;
        }
        /* Add more styling as needed */

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        section.animated-section {
            animation: fadeIn 1s ease-in-out;
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
.footer-copyright p{
    
    color: white;
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
    color: orange;
    transition: color 0.3s ease-in-out; /* Add a smooth transition effect for color changes */
}

.footer-column h2:hover {
    color: #e74c3c; /* Change the color on hover */
}
.footer-column p{
    color: white;
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
                    <a href="index.php">Home</a>
                    <a href="Customer_login.php">Customer Login</a>
                    <a href="Seller_login.php">Seller Login</a>
              
                </div>
                <div class="icon" onclick="toggleMenu()">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
    </section>

    <div class="container">
    <section class="animated-section">
            <h2>About us</h2>
            <p>Briefly introduce our company and its purpose. Farma Tools Rent is committed to...</p>
            <div class="content">
                <p>Welcome to Farma Tools Rent, your go-to destination for hassle-free agricultural equipment rental. Our platform connects farmers and tool providers, creating a seamless marketplace for renting and lending essential farming tools.</p>

                <p>With a foundation rooted in the agricultural community, Farma Tools Rent was founded with the vision of empowering farmers and optimizing the utilization of farming equipment. Our mission is to provide a user-friendly and reliable platform that simplifies the process of renting and offering agricultural tools.</p>

             

                <p>At Farma Tools Rent, we understand the significance of reliable and well-maintained equipment in agriculture. We aim to enhance the farming experience by fostering collaboration within the farming community and promoting sustainable practices.</p>

             

                <p>Join us in revolutionizing the way farming tools are accessed and shared. Whether you are a farmer looking to rent equipment or a provider wanting to contribute to the farming ecosystem, Farma Tools Rent is your dedicated partner in agricultural progress.</p>

               

                <p>Thank you for being a part of our journey towards a more connected and efficient farming future!</p>
            </div>
        </section>

        <section class="animated-section">
            <h2>Mission Statement</h2>
            <p>Clearly state our company's mission and what we aim to achieve. At Farma Tools Rent, our mission is...</p>
            <div class="content">
                <ul>
                    <li><span class="highlight-symbol">&#10003;</span> Provide easy access to high-quality farming tools for all farmers.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Foster collaboration and mutual benefit in the agricultural community.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Optimize the utilization of farming equipment for increased productivity.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Promote sustainable farming practices and environmental consciousness.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Empower farmers by offering a user-friendly and reliable platform.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Simplify the process of renting and offering agricultural tools.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Enhance the overall farming experience for our users.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Build a connected and supportive farming community.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Contribute to the growth and progress of agriculture.</li>
                    <li><span class="highlight-symbol">&#10003;</span> Strive for continuous improvement and innovation in agri-tech.</li>
                </ul>
            </div>
        </section>

      
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
            <li><a href="index.php">Home</a></li>
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
        // JavaScript to toggle the 'open' class on section click
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('section');
            sections.forEach(section => {
                section.addEventListener('click', function () {
                    this.classList.toggle('open');
                });
            });
        });
    </script>
</body>


    <script src="JavaScript/Index.js"></script>

</body>
</html>