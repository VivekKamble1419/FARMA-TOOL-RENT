
<?php
require 'config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}

// Fetch orders from the database
$orderQuery = "SELECT * FROM c_signup";
$orderResult = mysqli_query($conn, $orderQuery);


if (!empty($_POST['Customer_id'])) {
    $Customer_id = $_POST['Customer_id'];

  
    // Delete the feedback based on the email
    $deleteQuery = "DELETE FROM c_signup WHERE Customer_id = '$Customer_id'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        // Add this line to refresh the page after deletion
        echo '<script>window.location.href = "admin_customers.php";</script>';
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Report</title>
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
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
        white-space: nowrap; /* Prevents text from wrapping */
        overflow: hidden;
        text-overflow: ellipsis; /* Show ellipsis (...) for overflowed text */
    }
    .orders-dt{
        width: 100%;
        margin: auto;
        text-align: center;
        margin-top: 20px;
    }
    </style>
    <!-- Add this in the <head> section of your HTML -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.update-button').click(function () {
            var sellerId = $(this).closest('tr').find('td:eq(1)').text();
            var selectedStatus = $(this).closest('tr').find('select').val();

            $.ajax({
                type: 'POST',
                url: 'update_customer_status.php', // Create a new PHP file for handling updates
                data: {
                    Customer_id: sellerId,
                    selectedStatus: selectedStatus
                },
                success: function (response) {
                    alert(response); // Display a message or handle the response as needed
                    location.reload(); // Refresh the page after the update
                }
            });
        });
    });
</script>
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

 
    <div class="info">
        
            <h2>Customers Report:</h2>
            
          

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
                    Download Pdf
                    </button>
        </a>
        
        <table class="user-table">
            <thead>
                <tr>
                    <th>No.</th>

                    <th>Customer ID</th>
                    <th>Full Name</th>
                    <th>City/Village</th>
                    <th>State</th>
                    <th>District</th>
                    <th>Pin Code</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Account Status</th>
                    <th>Delete A/C</th>
                </tr>
            </thead>
            <tbody>
            <?php
                                    $counter = 1; // Initialize counter

                    while ($orderRow = mysqli_fetch_assoc($orderResult)) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$orderRow['Customer_id']}</td>";
                        echo "<td>{$orderRow['Full_name']}</td>";
                        echo "<td>{$orderRow['City_village']}</td>";
                        echo "<td>{$orderRow['State']}</td>";
                        echo "<td>{$orderRow['District']}</td>";
                        echo "<td>{$orderRow['Pin']}</td>";
                        echo "<td>{$orderRow['Mobile']}</td>";
                        echo "<td>{$orderRow['Email']}</td>";
                        echo "<td>{$orderRow['Password']}</td>";
                        echo "<td><select class='hide-display-dropdown'>
                        <option value='Active'" . ($orderRow['Account_status'] == 'Active' ? ' selected' : '') . ">Active</option>
                        <option value='Freeze'" . ($orderRow['Account_status'] == 'Freeze' ? ' selected' : '') . ">Freeze</option>                    </select><button class='update-button'>Update</button></td>";
                        echo "<td><form class='delete-form' method='post' action=''>
                        <input type='hidden' name='Customer_id' value='{$orderRow['Customer_id']}' />
                        <button type='submit' class='Delete'>Delete</button>
                    </form></td>";
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                    ?>
               
            </tbody>
        </table>

        
   
        </div>
        
    



</body>
</html>

