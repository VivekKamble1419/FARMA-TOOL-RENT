
<?php
require 'connection/config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="shortcut icon" href="images/favicon.png" />
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

        .select {
    margin-top: 10px;
}

label {
    font-size: 16px;
    margin-right: 10px;
}

.custom-select {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    color: #333;
}
.user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .user-table th, .user-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .user-table th {
        background-color: #f2f2f2;
    }

    .user-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    </style>
    <!-- Add this in the <head> section of your HTML -->

</head>
<body>
    <header>
        <h3>Welcome, <?php echo $customerRow['username']; ?></h3>
    </header>

    <nav>
         
        <a href="admin_Dashboard.php">Home</a>
        <a href="admin_customers.php">Customers</a>
        <a href="admin_seller.php">Sellers</a>
        <a href="admin_products.php">Products</a>

    </nav>

    <section class="main">
    <div class="btns">
      <a href="#"> <button class="btn">Total Transactions</button>  </a>
      <a href="admin_Total_orders.php" >
    <button class="btn" >Total Orders</button>
</a>
      <a href="#" style="text-decoration: none;"> <button class="btn" style="background-color: gray; color: black;">User Accounts</button>     </a>
      <a href="admin_feedback.php"><button class="btn">Feedback</button>
</a>
    <a href="logout.php"> <button class="btn">Logout</button>          </a>
    </div>
    <div class="info">
            <h2>All Users</h2>
            
            <div class="select">
    <label for="accountType">Select Account Type:</label>
    <select id="accountType" class="custom-select">
        <option value="all">All accounts</option>
        <option value="customer">Customer Accounts</option>
        <option value="seller">Seller Accounts</option>
    </select>
    <button type="button" onclick="searchData()">Search</button>
</div>

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
        
        <div class="user-data">
            <?php
$accountType = isset($_GET['accountType']) ? $_GET['accountType'] : 'all';

if ($accountType == 'all') {
    $query = "SELECT 'Customer' AS account_type, Customer_id AS id, Full_name, City_village, State, District, Pin, Email, Mobile, Password FROM c_signup 
              UNION 
              SELECT 'Seller' AS account_type, Seller_id AS id, Full_name, City_village, State, District, Pin, Email, Mobile, Password FROM s_signup";
} elseif ($accountType == 'customer') {
    $query = "SELECT 'Customer' AS account_type, Customer_id AS id, Full_name, City_village, State, District, Pin, Email, Mobile, Password FROM c_signup";
} elseif ($accountType == 'seller') {
    $query = "SELECT 'Seller' AS account_type, Seller_id AS id, Full_name, City_village, State, District, Pin, Email, Mobile, Password FROM s_signup";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    echo '<table class="user-table">
            <thead>
                <tr>
                    <th>Account Type</th>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>City/Village</th>
                    <th>State</th>
                    <th>District</th>
                    <th>PIN</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Password</th>
                    <!-- Add more columns as needed -->
                </tr>
            </thead>
            <tbody>';

    while ($userRow = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$userRow['account_type']}</td>";
        echo "<td>{$userRow['id']}</td>";
        echo "<td>{$userRow['Full_name']}</td>";
        echo "<td>{$userRow['City_village']}</td>";
        echo "<td>{$userRow['State']}</td>";
        echo "<td>{$userRow['District']}</td>";
        echo "<td>{$userRow['Pin']}</td>";
        echo "<td>{$userRow['Email']}</td>";
        echo "<td>{$userRow['Mobile']}</td>";
        echo "<td>{$userRow['Password']}</td>";
        // Add more columns as needed
        echo "</tr>";
    }

    echo '</tbody></table>';
} else {
    echo '<p>No users found.</p>';
}

            ?>
        </div>
       
        </div>
        
    </div>
    
  
    </section>
<!-- ... (your existing HTML code) ... -->

<script>
    function changeAccountType() {
        var selectedAccountType = document.getElementById("accountType").value;
        window.location.href = 'your_page.php?accountType=' + selectedAccountType;
    }

   function searchData() {
    var selectedAccountType = document.getElementById("accountType").value;
    var url = 'fetch_data.php?accountType=' + selectedAccountType;

    // Perform an AJAX request to fetch data based on the selected account type
    // Update the URL and handle the response to update the table
    // Example using Fetch API
    fetch(url)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            // Assuming the server returns the HTML content for the table
            document.querySelector('.user-data').innerHTML = data;
        })
        .catch(error => console.error('Error fetching data:', error));
}
</script>

<!-- ... (rest of your HTML code) ... -->


</body>
</html>

