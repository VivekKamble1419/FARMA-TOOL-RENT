<div class="D-r">
        <?php
       
        // Query to fetch data from the database
        $result = $conn->query("SELECT order_id, Seller_id,Product_Image,Product_name FROM sell_product");
        $result= $conn->query("SELECT Full_name FROM s_signup");
        // Check if there are any rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <img src="<?php echo $row['Product_Image']; ?>" alt="Card Image">
                    <div class="card-content">
                        <p>Product name :<?php echo $row['Product_name']; ?></p>
                        <p> name :<?php echo $row['Full_name']; ?></p>
                        <a href="#" class="button">More details</a>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>