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
                        <p>Available Quantity:  <?php echo $row['available_quantity']; ?></p>

                        
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
                                for ($i = 1; $i <= $row['available_quantity']; $i++) {
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

                    // rest of your JavaScript code...
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
