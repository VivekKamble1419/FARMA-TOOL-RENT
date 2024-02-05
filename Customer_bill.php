<?php
require 'connection/config.php';

if (!empty($_SESSION['Customer_id'])) {
    $Customer_id = $_SESSION['Customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id = $Customer_id");
    $row = mysqli_fetch_assoc($result);

    if (isset($_GET['id'])) {
        $orderId = $_GET['id'];

        // Fetch order details based on the provided order ID
        $orderResult = mysqli_query($conn, "SELECT * FROM orders WHERE id = $orderId");
        $orderRow = mysqli_fetch_assoc($orderResult);

        if (!$orderRow) {
            // Handle case where order with the provided ID is not found
            // echo "Order not found.";
            exit();
        }

        // Fetch product image from sell_product table using Product_id and Seller_id
        $productId = $orderRow['product_id'];
        $sellerId = $orderRow['Seller_id'];

        // After fetching the image from sell_product table
        $imageQuery = mysqli_query($conn, "SELECT * FROM sell_product WHERE product_id = $productId AND Seller_id = $sellerId");
        $imageRow = mysqli_fetch_assoc($imageQuery);

        // Debugging
        // var_dump($imageQuery); // Check if the query is successful
        //var_dump($imageRow);   // Check the fetched image row
    } else {
        // Handle case where 'id' is not set in the URL
        header("Location: Customer_orders.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Details</title>
    <link rel="stylesheet" href="Css/Index2.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }

        .section-2 {
            margin: auto;
            width: 80%;
            text-align: left;
        }

        .orders-dt {
            text-align: center;
            line-height: 1.5;
        }

        .bill,
        .orders-dt,
        .order-tracker,
        .card,
        table {
            width: 100%;
            margin: auto;
            margin-top: 20px;
        }

        .order-image img {
            width: 300px;
            height: 250px;
        }

        .order-details {
            width: 50%;
            margin: 20px auto;
        }
        .bill {
        margin-left: -50px; /* Adjust the left margin as needed */
    }


        .order-details p {
            font-size: 18px;
            line-height: 1.5;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .total {
            font-weight: bold;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
    <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>

<body>

    <section class="section-2">
        <div class="bill">

            <div class="orders-dt">
                <div class="text">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
                    <h3>Vishrambag Sangli, Maharashtra,416416</h3>
                    <h3>Contact: 7709629488 Email: mrvivekkamble8@gmail.com</h3>
                    <br>
                </div>
                <hr>
            </div>
          
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Time Period</th>
                        <th>Product Quantity</th>
                        <th>Product Quality</th>
                        <th>Order Date</th>
                        <th>Payment Method</th>
                        <th>Rent Per Day</th>
                        <th>Total Payable Rent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $orderRow['Product_name']; ?></td>
                        <td><?php echo $orderRow['order_for']; ?> Days</td>
                        <td><?php echo $orderRow['order_quantity']; ?></td>
                        <td><?php echo $imageRow['product_quality']; ?></td>
                        <td><?php echo $orderRow['order_date_time']; ?></td>
                        <td>Cash On Delivery</td>
                        <td>Rs. <?php echo $orderRow['rent']; ?></td>
                        <td>Rs. <?php echo $orderRow['total_payable']; ?></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="total">
                        <td colspan="6">Gst:</td>
                        <td>0 %</td>
                        <td>Rs. 0</td>
                    </tr>
                    <tr class="total">
                        <td colspan="7">Total:</td>
                        <td>Rs. <?php echo $orderRow['total_payable']; ?></td>
                    </tr>
                </tfoot>
            </table>

            <button onclick="downloadPDF()">Download PDF</button>
            <a href="Customer_orders.php"><button style="background-color: red; color: white; padding: 10px; border: none; border-radius: 5px; cursor: pointer;">Cancel</button></a>

        </div>
    </section>

    <script>
        function downloadPDF() {
            var element = document.body;

            html2pdf(element);
        }
    </script>
</body>

</html>
