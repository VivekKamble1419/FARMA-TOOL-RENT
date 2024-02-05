
<?php
require 'connection/config.php';

if (!empty($_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}

// Get the selected location from the URL parameter
$selectedLocation = isset($_GET['location']) ? $_GET['location'] : null;
// Fetch feedback from the database
$feedbackQuery = "SELECT * FROM feedback";
$feedbackResult = mysqli_query($conn, $feedbackQuery);

if (!empty($_POST['email'])) {
    $email = $_POST['email'];

    
    // Your thanking message
    $message = "Thank you for your feedback.";

    // Send email
    $subject = "Thank You";
    $headers = "From: mrvivekkamble@gmail.com";  // Replace with your email address

    if (mail($email, $subject, $message, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Error sending email.";
    }
    // Delete the feedback based on the email
    $deleteQuery = "DELETE FROM feedback WHERE Email = '$email'";
    $result = mysqli_query($conn, $deleteQuery);

    if ($result) {
        // Add this line to refresh the page after deletion
        echo '<script>window.location.href = "admin_feedback.php";</script>';
    }
   
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }
        .info h2 {
            margin-bottom: 10px; /* Adjusted margin-bottom */
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
            background-color: #f9f9f9; /* Alternate row background color */
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

    </style>
    <!-- Add this in the <head> section of your HTML -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
      <a href="admin_Total_orders.php"> <button class="btn">Total Orders</button>       </a>
      <a href="admin_user_accounts.php"> <button class="btn">User Accounts</button>     </a>
      <a href="#" style="text-decoration: none;">
    <button class="btn" style="background-color: gray; color: black;">Feedback</button>
</a>
    <a href="logout.php"> <button class="btn">Logout</button>          </a>
    </div>
    <div class="info">
        <h2>Customer Feedback</h2>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>contact</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $counter = 1; // Initialize counter
                    while ($row = mysqli_fetch_assoc($feedbackResult)) {
                        echo "<tr>";
                        echo "<td>{$counter}</td>";
                        echo "<td>{$row['Name']}</td>";
                        echo "<td>{$row['Email']}</td>";
                        echo "<td>{$row['Message']}</td>";
                        echo "<td><a href='mailto:{$row['Email']}?subject=Thank%20You&body=Thank%20you%20for%20your%20feedback'><button class='Contact'>Contact</button></a></td>
                        ";
                        echo "<td>
                        <form class='delete-form' method='post' action=''>
                            <input type='hidden' name='email' value='{$row['Email']}' />
                            <button type='submit' class='Delete'>Delete</button>
                        </form>
                      </td>";
                        echo "</tr>";
                        $counter++; // Increment counter
                    }
                    ?>
            </tbody>
        </table>
        
<script>
    // Add this script to your HTML file
    document.addEventListener('DOMContentLoaded', function () {
        var deleteForms = document.querySelectorAll('.delete-form');

        deleteForms.forEach(function (form) {
            form.addEventListener('submit', function (event) {
                var confirmed = confirm('Are you sure you want to delete this feedback?');

                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
    </div>
    
    <script>
          
        </script>
    </section>

    <script>
    
    </script>
</body>
</html>

