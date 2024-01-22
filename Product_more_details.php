<?php 
require 'connection/config.php';

// Check if the user is logged in
if (!empty($_SESSION['Customer_id'])) {
    $Customer_id = $_SESSION['Customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id=$Customer_id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: Customer_login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="Css/Index2.css">
</head>
<style>
    .Productpic_info {
        padding-inline: 30px;
        display: flex;
        flex-direction: row;
        line-height: 1.7;
        font-weight: bolder;
        gap: 8rem;
    }
    .section-2{
        padding-top: 11%;
    }
    .section-2 p{
        font-size: 18px;
    }
    .main {
        display: flex;
        flex-direction: row;
    }
    .product_image img {
        height: 300px;
        width: 500px;
        border: solid 1.5px;
    }
    .product_info {
        line-height: 2;
    }
    .product_info button {
        margin: auto;
        margin-top: 30px;
        margin-left: 220px;
        font-size: 20px;
        color: white;
        cursor: pointer;
        border: none;
        padding: 20px 70px;
        border-radius: 5px;
        background-color: rgb(179, 17, 212);
    }
    .product_condiction h3 {
        text-align: center;
    }
    .order-for{
        display: flex;
        gap: 2rem;
    }
    .order-quantity{
        display: flex;
        gap: 2rem;
    }
    .order-for label,
    .order-quantity label{
        color: black;
        font-size: 18px;
    }
    #orderFor, #orderQuantity {
        font-size: 18px;
        border: none;
        padding: 0;
        width: 30%;
    }
    select{
        margin-bottom: 5px;
    }
    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: transparent;
        z-index: 2;
        /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); */
    }

    .popup .btn{
     
        color: white;
        cursor: pointer;
        border: none;
        padding: 20px 70px;
        border-radius: 5px;
        gap: 2rem;
        display: flex;
     
    }
    #confirmOrder{
        font-size: 15px;
        margin-top: 0;
        margin-left: 0;
        margin-top: 0;
        margin-left: 0;

    }
    #cancelOrder{
        font-size: 15px;
        margin-top: 0;
        margin-left: 0;
        margin-top: 0;
        margin-left: 0;
    }
    .popup .btn{
        justify-content: center;
        text-align: center;

    }

    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color:  #ffffff83; /* Semi-transparent black background */
        z-index: 1;
        backdrop-filter: blur(30px); /* Apply blur effect to the background */
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading {
    background: url('./Images/loading.gif') center center no-repeat;
    border: none;
    width: 300px;
    height: 80px;
    display: flex;
    margin: 0 auto;
}
.loading-2 {
    background: url('./Images/order4.gif') center center no-repeat;
    border: none;
    width: 350px;
    height: 350px;
    display: flex;
    margin: 0 auto;
}

    /* Responsive adjustments */
    @media only screen and (max-width: 768px) {
        .section-2 {
            margin: 100px auto auto 24px;
        }
    }
</style>
<body>
    <section class="section1">
        <div class="logo">
            <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div class="navbar">
            <h1>Welcome  <?php echo $row["Full_name"];?></h1>
            <div class="menu" id="menu">
                <a href="Customer_Dashboard.php">Home</a>
                <a href="Customer_orders.php">Orders</a>
                <a href="Customer_Profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
            <div class="icon" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </section>
    <div class="section-2">
        <?php    
        // Retrieve product_id from the URL
        if(isset($_GET['product_id'])){
            $product_id = $_GET['product_id'];

            // Your SQL query to fetch details based on product_id
            $query = "SELECT sell_product.*, s_signup.Full_name, Email, City_village, State, District, Pin
            FROM sell_product
            INNER JOIN s_signup ON sell_product.Seller_id = s_signup.Seller_id 
            WHERE sell_product.product_id = $product_id";
            $result1 = $conn->query($query);

            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    // Your HTML content here
                    ?>
                    <div class="Productpic_info">
                        <div class="product_image">
                            <img src="<?php echo $row['Product_Image']; ?>" alt="">
                            <div class="product_condiction">
                                <h3>Product name:  <?php echo $row['Product_name']; ?></h3>
                                <p>Product Quality: <?php echo $row['product_quality']; ?></p>
                                <p>Seller name:  <?php echo $row['Full_name']; ?>  </p>
                                <p>Seller email: <?php echo $row['Email']; ?></p>
                            </div>
                        </div>
                        <div class="product_info">
                            <p>Product name:  <?php echo $row['Product_name']; ?></p>
                            <p>Seller id:  <?php echo $row['Seller_id']; ?></p>
                            <p>Seller Location: <?php echo $row['State'], ",",$row['District'],"," ,$row['Pin']; ?></p>
                            <p>Discription :  <?php echo $row['product_discription']; ?></p>
                            <p>Available Quantity:  <?php echo $row['available_qantity']; ?></p>

                            
                            <div class="order-for">
                                <label for="orderFor">Order For:</label>
                                <select id="orderFor" name="orderFor">
                                    <?php
                                    // Populate dropdown with numbers 1 to 10
                                    for ($i = 1; $i <= 10; $i++) {
                                        echo "<option value='$i'>$i Day's</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="order-quantity">
                                <label for="orderQuantity">Order Quantity:</label>
                                <select id="orderQuantity" name="orderQuantity">
        <?php
        // Populate dropdown with available quantity
        for ($i = 1; $i <= $row['available_qantity']; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
                            </div>
                            <p>Rent Per Day: <?php echo $row['rent']; ?></p>
                            <p id="payableAmount">Total Payable Amount: <?php echo $row['rent']; ?></p>
                            <!-- Add data attributes to store relevant information -->
                            <button id="orderButton" 
    data-product-name="<?php echo $row['Product_name']; ?>"
    data-seller-id="<?php echo $row['Seller_id']; ?>"
    data-location="<?php echo $row['State'] . ',' . $row['District'] . ',' . $row['Pin']; ?>"
    data-rent="<?php echo $row['rent']; ?>"
    data-product-id="<?php echo $row['product_id']; ?>"
>Order now</button>



                            <div class="popup" id="confirmationPopup">
                                <p>Are you sure you want to place the order?</p>
                                
                                <div class="btn">
                                    
                                    <button id="cancelOrder">Cancel</button>
                                    <button id="confirmOrder" onclick="confirmOrder()">Confirm Order</button>
                                   
                                </div>
                                </div>

                            <!-- Overlay -->
                            <div class="overlay" id="overlay"></div>
                        </div>
                    </div>
                    <script>                         
                            
                            function showConfirmationPopup() {
        confirmationPopup.style.display = "block";
        overlay.style.display = "block"; // Change this line
        document.body.style.overflow = 'hidden';
    }

    function hideConfirmationPopup() {
        confirmationPopup.style.display = "none";
        overlay.style.display = "none";
        document.body.style.overflow = '';
    }
   
function confirmOrder() {
    // Display the loading animation
    confirmationPopup.innerHTML = "<div class='loading'></div>";

    // Get the order details
    const orderFor = document.getElementById("orderFor").value;
    const orderQuantity = document.getElementById("orderQuantity").value;
    const rent = <?php echo $row['rent']; ?>;
    const payableAmount = rent * orderFor * orderQuantity;

    // Retrieve data attributes
    const Product_name = orderButton.getAttribute("data-product-name");
    const Seller_id = orderButton.getAttribute("data-seller-id");
    const Location = orderButton.getAttribute("data-location");

    // Display the confirmation popup with order details
    showConfirmationPopup();

    // Update the confirmation popup content with order details
    confirmationPopup.innerHTML = `
        <p>Are you sure you want to place the order?</p>
        <p>Product Name: ${Product_name}</p>
        <p>Seller ID: ${Seller_id}</p>
        <p>Location: ${Location}</p>
        <p>Order For: ${orderFor} days</p>
        <p>Order Quantity: ${orderQuantity}</p>
        <p>Total Payable Amount: ${payableAmount}</p>

        <div class="btn">
            <button id="cancelOrder" onclick="hideConfirmationPopup()">Cancel</button>
            <button id="confirmOrder" onclick="proceedWithOrder()">Confirm Order</button>
        </div>
    `;
}

function proceedWithOrder() {
    // Retrieve the order details
    const orderFor = document.getElementById("orderFor").value;
    const orderQuantity = document.getElementById("orderQuantity").value;
    const rent = <?php echo $row['rent']; ?>;
    const payableAmount = rent * orderFor * orderQuantity;

    // Retrieve data attributes
    const Product_name = orderButton.getAttribute("data-product-name");
    const Seller_id = orderButton.getAttribute("data-seller-id");
    const Location = orderButton.getAttribute("data-location");

    // Simulate order placement by delaying the process
    setTimeout(function () {
        // Show the "Order Placed" message
        confirmationPopup.innerHTML = "<div class='loading'></div>";

        // Save order data to the database
        saveOrderData(Product_name, Seller_id, Location, orderFor, orderQuantity, payableAmount);

        // Delay for a short duration before redirecting to the dashboard page
        setTimeout(function () {
        confirmationPopup.innerHTML = "<div class='loading-2'></div>";

            // Redirect to the dashboard page after hiding the "Order Placed" message
            window.location.href = "Customer_Dashboard.php";
        }, 3000);
    }, 5000);
}
function saveOrderData(Product_name, Seller_id, Location, order_for, order_quantity, payableAmount) {
    // Retrieve additional data attributes
    const product_id = orderButton.getAttribute("data-product-id");
    const rent = orderButton.getAttribute("data-rent");

    // Use AJAX to send the data to the server
    const xhr = new XMLHttpRequest();
    const url = 'save_order.php';

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Define the data to be sent to the server
    const data = `Product_name=${encodeURIComponent(Product_name)}&Seller_id=${encodeURIComponent(Seller_id)}&Location=${encodeURIComponent(Location)}&order_for=${order_for}&order_quantity=${order_quantity}&payableAmount=${payableAmount}&product_id=${product_id}&rent=${rent}`;

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // The request was successful, you can handle the response here if needed
            console.log(xhr.responseText);
        }
    };

    // Send the request
    xhr.send(data);
}


document.addEventListener("DOMContentLoaded", function () {
    const orderForSelect = document.getElementById("orderFor");
    const orderQuantitySelect = document.getElementById("orderQuantity");
    const payableAmountElement = document.getElementById("payableAmount");
    const orderButton = document.getElementById("orderButton");
    const confirmationPopup = document.getElementById("confirmationPopup");
    const overlay = document.getElementById("overlay");
    const confirmOrderButton = document.getElementById("confirmOrder");
    const cancelOrderButton = document.getElementById("cancelOrder");

    function updatePayableAmount() {
        const rent = <?php echo $row['rent']; ?>;
        const orderForValue = parseInt(orderForSelect.value);
        const orderQuantityValue = parseInt(orderQuantitySelect.value);
        const payableAmount = rent * orderForValue * orderQuantityValue;

        payableAmountElement.textContent = "Total Payable Amount: " + payableAmount;
    }

    orderForSelect.addEventListener("change", updatePayableAmount);
    orderQuantitySelect.addEventListener("change", updatePayableAmount);
    orderButton.addEventListener("click", showConfirmationPopup);
    confirmOrderButton.addEventListener("click", confirmOrder);
    cancelOrderButton.addEventListener("click", hideConfirmationPopup);

    orderForSelect.addEventListener("change", updatePayableAmount);
    orderQuantitySelect.addEventListener("change", updatePayableAmount);

    updatePayableAmount(); // Initial update to set the default payable amount
});
                    </script>
                    <?php
                }
            } else {
                echo "0 results";
            }
            // Close connection
            $conn->close();
        } else {
            // Handle the case where product_id is not provided in the URL
            echo "Order ID not specified.";
        }
        ?>
    </div>
    <script src="JavaScript/Index.js"></script>
</body>
</html>

