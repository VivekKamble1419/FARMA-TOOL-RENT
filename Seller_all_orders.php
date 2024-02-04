<?php
require 'connection/config.php';

if (!empty($_SESSION['Seller_id'])) {
    $Seller_id = $_SESSION['Seller_id'];
    $result = mysqli_query($conn, "SELECT * FROM s_signup WHERE Seller_id = $Seller_id");
    $row = mysqli_fetch_assoc($result);
    $ordersResult = mysqli_query($conn, "SELECT * FROM orders WHERE Seller_id = $Seller_id ORDER BY order_date_time DESC");
} else {
    header("Location: Seller_login.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_order_status"])) {
    $orderId = isset($_POST["order_id"]) ? $_POST["order_id"] : null;
    $selectedStatus = isset($_POST["order_status"]) ? $_POST["order_status"] : null;

    // Check if orderId and selectedStatus are not null before proceeding
    if ($orderId !== null && $selectedStatus !== null) {
        $updateQuery = "UPDATE orders SET order_status = ? WHERE id = ? AND Seller_id = ?";
        $stmt = mysqli_prepare($conn, $updateQuery);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sii", $selectedStatus, $orderId, $Seller_id);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // echo "Order status updated successfully";
        } else {
            echo "Error updating order status: " . mysqli_error($conn);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } 
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
    body {
        margin: 0;
        padding: 0;
    }
    .section-2{
        padding-top: 10%;
        width: 100%;
        height: auto;
        padding-bottom: 100px;
    }
    .section-2 h1{
        margin-left: 4%;
        padding-bottom: 20px;
    }
    .image1 img{
        width: 80%;
        height: 250px;
    }
    .image1 {
        width: 100%;
        margin: auto;
        align-items: center;
        text-align: center;
    }
    .info1{
        width: 100%;
        margin: auto;
        justify-content: left;
        line-height: 2;
        font-size: 20px;
        font-weight: 600;
    }
    .place{
        width: 100%;
        margin: auto;
        align-items: center;
        text-align: center;
        font-size: 20px;
        font-weight: 600;
    }
    .orders{
        width: 80%;
        height: 300px;
        margin: auto;
        margin-top: 2rem;
        display: flex;
        background-color: #F5F5F5;
        box-shadow: 2px 2px 2px 2px gray;
    }
    .place p{
        color: green;
    }
    .place .detail{
        font-size: 14px;
        color: red;
    }
/* Add styles for the rejected class */
#rejected {
    color: red;
    font-weight: 800;
}

/* Add styles for the detail class within the rejected class */
.place.rejected .detail {
    color: orange; /* Set the color for the detail message within rejected orders */
}

th, tr {
        margin: 10px;
        width: 150px;
    }
    td img {
        height: 100px;
        width: 100px;
    }
/* Add styles for the table */
.orders-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Add styles for table headers */
.orders-table th {
    background-color: #f2f2f2;
    padding: 8px;
    text-align: left;
    border: 1px solid #dddddd;
}

/* Add styles for table cells */
.orders-table td {
    padding: 8px;
    text-align: left;
    border: 1px solid #dddddd;
}

/* Add hover effect on table rows */
.orders-table tbody tr:hover {
    background-color: #f5f5f5;
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
                <a href="Seller_Dashboard.php">Home</a>
                <a href="Seller_Profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
            <div class="icon" onclick="toggleMenu()">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </section>
    <section class="section-2">
    <h1>All Orders</h1>

  

    <div class="frame-right D-r">
    <table class="orders-table">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Order Status</th>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Address</th>
                <th>Customer Mobile No</th>
                <th>Customer Email</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Order Quantity</th>
                <th>Rent Period</th>
                <th>Rent</th>
                <th>Total Rent</th>
            </tr>
        </thead>
        <tbody>
        <?php
                    $query = "SELECT orders.*, Sell_product.Product_id, Sell_product.Product_Image, c_signup.*
                    FROM orders
                    INNER JOIN Sell_product ON orders.Product_id = Sell_product.Product_id
                    INNER JOIN c_signup ON orders.Customer_id = c_signup.Customer_id
                    WHERE orders.Seller_id = $Seller_id
                    AND orders.order_status NOT IN ('', 'Rejected')
                    ORDER BY orders.Seller_id DESC";
                    $result = $conn->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                  <td><img src="<?php echo $row['Product_Image']; ?>" alt="Card Image"></td>
        <td>
                <form method="post" action="">
                <select value="Select order status" name="order_status" id="order_status_<?php echo $row['id']; ?>" onchange="updateOrderStatus(<?php echo $row['id']; ?>)">
                        <option value="Placed" <?php echo ($row['order_status'] == 'Placed') ? 'selected' : ''; ?>>Placed</option>
                        <option value="Accepted" <?php echo ($row['order_status'] == 'Accepted') ? 'selected' : ''; ?>>Accepted</option>
                        <option value="Shipped" <?php echo ($row['order_status'] == 'Shipped') ? 'selected' : ''; ?>>Shipped</option>
                        <option value="Delivered" <?php echo ($row['order_status'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                    </select>
                    <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="update_order_status" value="Update Status">
                </form>


        </td>

                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['Full_name']; ?></td>
                    <td><?php echo $row['City_village'] . ", " . $row['State'] . "," . $row['District'] . "," . $row['Pin']; ?></td>
                    <td><?php echo $row['Mobile']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['Product_id']; ?></td>
                    <td><?php echo $row['Product_name']; ?></td>
                    <td><?php echo $row['order_quantity']; ?></td>
                    <td><?php echo $row['order_for'] . " Day's"; ?></td>
                    <td><?php echo $row['rent']; ?></td>
                    <td><?php echo $row['total_payable']; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?></tbody>
        </table>
    </div>
</section>
<script>
    // Function to handle the change event of the order status dropdown
    function updateOrderStatus(orderId) {
        var selectedStatus = $("#order_status_" + orderId).val();

        // AJAX request to update the order status
        $.ajax({
            type: "POST",
            url: "update_order_status.php",
            data: { order_id: orderId, order_status: selectedStatus, update_order_status: true },
            success: function(response) {
                console.log(response);
                // Check if the response contains the success message
                if (response.includes("Order status updated successfully")) {
                    // Update the table cell with the new order status
                    // Assuming you have a cell with ID 'order_status_cell_' + orderId
                    $("#order_status_cell_" + orderId).text(selectedStatus);
                } else {
                    console.error("Error updating order status:", response);
                }
            },
            error: function(error) {
                console.error("Error updating order status:", error.responseText);
            }
        });
    }

   
</script>

    <script src="JavaScript/Index.js"></script>
</body>
</html>
