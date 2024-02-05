
<?php
require 'connection/config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}

// Fetch orders from the database
$productQuery = "SELECT sp.*, ss.* 
                 FROM sell_product sp
                 JOIN s_signup ss ON sp.Seller_id = ss.Seller_id";

$orderResult = mysqli_query($conn, $productQuery);



if (!empty($_POST['delete_product_id'])) {
    $delete_product_id = $_POST['delete_product_id'];

    // Delete the product based on the product_id
    $deleteQuery = "DELETE FROM sell_product WHERE product_id = '$delete_product_id'";
    $result = mysqli_query($conn, $deleteQuery);


 if ($result) {
     // Add this line to refresh the page after deletion
     echo '<script>window.location.href = "admin_products.php";</script>';
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #2c384a;
            color: white;
            padding: 5px;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 1000; /* Set a higher z-index to make sure it's above other elements */
        }

        nav {
            background-color: gainsboro;
            padding: 10px;
            padding-left: 300px;
            position: sticky;
            top: 55px; /* Height of the header */
            z-index: 1000; /* Set a higher z-index to make sure it's above other elements */
        }

        nav a {
          
            color: black;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            margin: 0 20px;
        }

        nav a:hover {
            background-color: #777;
        }

      
        .main {
            display: flex;
            height: 82vh;
        }

        .btns {
            width: 20%; /* 30% width, fixed size */
            background-color: #3c4b64;
            padding: 10px;
            box-sizing: border-box;
            overflow-y: auto; /* Enable vertical scrolling */
        }
        .btns .btn{
          margin-top: 20px;
        }
     
        .info {
            flex: 1; /* Takes the remaining 70% */
            padding: 5px;
            overflow-y: auto; /* Enable vertical scrolling */
            display: flex;
            gap: 10px;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .btn {
            width: 100%;
            background-color: #3c4b64;
            font-size: 18px;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        .btn:hover {
            background-color: #777;
        }
      
        
        .info {
            padding: 20px;
            overflow-y: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        td button {
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 2px;
            cursor: pointer;
            border-radius: 3px;
        }

        td button:hover {
            transition: background-color 0.3s;
        }

        td button.Contact {
            background-color: #007bff; /* Blue color for Contact button */
            color: white;
            border: none;
        }

        td button.Delete {
            background-color: #dc3545; /* Red color for Delete button */
            color: white;
            border: none;
        }

        .hide-display-dropdown {
        padding: 5px;
        font-size: 14px;
    }

    .update-button {
        padding: 5px 10px;
        font-size: 12px;
        cursor: pointer;
        border-radius: 3px;
        background-color: #007bff; /* Blue color for the button */
        color: white;
        border: none;
    }

    .update-button:hover {
        background-color: #0056b3; /* Darker blue color on hover */
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
        white-space: nowrap; /* Prevents text from wrapping */
        overflow: hidden;
        text-overflow: ellipsis; /* Show ellipsis (...) for overflowed text */
    }


    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    td img {
        max-width: 100px;
        max-height: 100px;
    }

    td select,
    td button {
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 12px;
        margin: 2px;
        cursor: pointer;
        border-radius: 3px;
    }

    td select {
        width: 80px; /* Adjust width as needed */
    }

    td button:hover {
        transition: background-color 0.3s;
    }

    td button.Contact {
        background-color: #007bff; /* Blue color for Contact button */
        color: white;
        border: none;
    }

    td button.Delete {
        background-color: #dc3545; /* Red color for Delete button */
        color: white;
        border: none;
    }

  
    </style>
    <!-- Add this in the <head> section of your HTML -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
    $('.update-button').click(function () {
        var productId = $(this).closest('tr').find('td:eq(3)').text(); // Assuming product_id is in the 4th column
        var selectedStatus = $(this).closest('tr').find('select').val();

        $.ajax({
            type: 'POST',
            url: 'update_product_status.php',
            data: {
                product_id: productId,
                selectedStatus: selectedStatus
            },
            success: function (response) {
                console.log(response); // Log the response to the console
                alert(response); // Display a message or handle the response as needed
                location.reload(); // Refresh the page after the update
            }
        });
    });
});

</script>
</head>
<body>
    <header>
        <h3>Welcome, <?php echo $customerRow['username']; ?></h3>
    </header>

    <nav>
         
        <a href="admin_Dashboard.php">Home</a>
        <a href="admin_customers.php" >
            Customers
        </a>
        <a href="admin_seller.php">Sellers</a>
        <a href="#" style="text-decoration: none; background-color: gray; color: black;">Products</a>

    </nav>

    <section class="main">
    <div class="btns">
      <a href="admin_Total_Transaction.php"> <button class="btn">Total Transactions</button>  </a>
      <a href="admin_Total_orders.php" >
    <button class="btn" >Total Orders</button>
        </a>
      <a href="admin_user_accounts.php"> <button class="btn">User Accounts</button>     </a>
      <a href="admin_feedback.php"><button class="btn">Feedback</button>
        </a>
    <a href="logout.php"> <button class="btn">Logout</button>          </a>
    </div>


    <div class="info">
            <h2>All Products</h2>

            <a href="#" style="text-decoration: none;">
                <button style="background-color: #4CAF50; /* Green */
                    border: none;
                    color: white;
                    padding: 15px 32px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                    margin: 4px 2px;
                    cursor: pointer;
                    border-radius: 8px;">
                    Download Report
                </button>
            </a>
            <table>
            <thead>
                <tr>
                <th>No.</th>

                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product ID</th>
                    <th>Seller ID</th>
                    <th>Seller Name</th>
                    <th>Order Status</th>

                    <th>Available Quantity</th>
                    <th>Rent Per Day</th>
                    <th>Product Quality</th>
                    <th>Product Description</th>
                    <th>Hide / Display Product</th>
                    <th>Delete Product</th>
                </tr>
            </thead>
            <tbody>
            <?php
                                    $counter = 1; // Initialize counter

                    while ($orderRow = mysqli_fetch_assoc($orderResult)) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td><img src='{$orderRow['Product_Image']}' alt='Product Image'></td>";
                        echo "<td>{$orderRow['Product_name']}</td>";
                        echo "<td>{$orderRow['product_id']}</td>";
                        echo "<td>{$orderRow['Seller_id']}</td>";
                        echo "<td>{$orderRow['Full_name']}</td>";
                        echo "<td>{$orderRow['Product_status']}</td>";
                        echo "<td>{$orderRow['available_qantity']}</td>";
                        echo "<td>Rs. {$orderRow['rent']} </td>";
                        echo "<td>{$orderRow['product_quality']}</td>";
                        echo "<td>{$orderRow['product_discription']}</td>";
                        
                    echo "<td><select class='hide-display-dropdown'>
                    <option value='Display'" . ($orderRow['Product_status'] == 'Display' ? ' selected' : '') . ">Display</option>
                    <option value='Hide'" . ($orderRow['Product_status'] == 'Hide' ? ' selected' : '') . ">Hide</option>                   
                     </select><button class='update-button'>Update</button></td>";
                    
                    echo "<td>
                    <form class='delete-form' method='post' action=''>
                        <input type='hidden' name='delete_product_id' value='{$orderRow['product_id']}' />
                        <button type='submit' class='Delete' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</button>
                    </form>
                  </td>";
            
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                    ?>
                
            </tbody>
        </table>
        </div>
        
    </div>
    
  
    </section>


</body>
</html>

