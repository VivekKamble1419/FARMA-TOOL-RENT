
<?php
require 'config.php';

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
    <title>User Accounts</title>
    <link rel="shortcut icon" href="fab.jpg" />
    <link rel="stylesheet" href="Index2.css">
    <link rel="stylesheet" type="text/css" href="Print.css" media="print">
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
    .orders-dt{
        width: 100%;
        margin: auto;
        text-align: center;
        margin-top: 20px;
    }

    </style>
    <!-- Add this in the <head> section of your HTML -->

</head>
<body>
<div class="orders-dt">
                <div class="text">
                    <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
                    <h3>Vishrambag Sangli, Maharashtra,416416</h3>
                    <h3>Contact: 7709629488 Email: mrvivekkamble8@gmail.com</h3>
                    <h3>Contact: 8208951770 Email: chaitanyakashid961@gmail.com</h3>
                    <br>
                </div>
                <hr>
</div>
    
   
<h2>All Users</h2>
<a href="#" style="text-decoration: none;" id="prnt-btn">
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
       border-radius: 8px;" onclick="window.print()">
        Download Report
        </button>
</a>

    <div class="info">
            
    

        <div class="user-data" >
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
        
    
  


</body>
</html>

