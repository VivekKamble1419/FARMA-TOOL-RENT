<?php
require 'connection/config.php';

if (!empty($_SESSION['Customer_id'])) {
    $Customer_id = $_SESSION['Customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM c_signup WHERE Customer_id=$Customer_id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: Customer_Dashboard.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Customer_id'])) {
    $customerID = $_POST['Customer_id'];

    // Delete profile from the database
    $deleteQuery = "DELETE FROM c_signup WHERE Customer_id = $customerID";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Successful deletion
        header("Location: index.php"); // Redirect to index page
        exit();
    } else {
        // Error occurred during deletion
        echo 'error: ' . mysqli_error($conn); // Display the MySQL error for debugging
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Profile</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />

    <link rel="stylesheet" href="Css/Profile.css">
    <style>
        /* Add/Delete as needed for styling */
        .delete-profile-button,
        .edit-profile-button {
            background-color: #dc3545; /* Bootstrap danger color, you can change it */
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-block: 30px;
            margin-left: 28%;
        }

        .delete-profile-button:hover,
        .edit-profile-button:hover {
            background-color: #bb2d3b; /* Darker shade for hover effect, you can change it */
        }
    </style>
</head>

<body>
    <div class="main_div">
        <div class="logo">
            <h1><span class="farm">Farm </span><span class="Tools"> Tools </span><span class="Rent"> Rent</span></h1>
        </div>
        <div>
            <nav>
                <ul>
                    <li class="seller-wel">Welcome <?php echo $row["Full_name"]; ?></li>
                    <div class="icons">
                        <li><a href="Customer_Dashboard.php" id="customer-login">Home</a></li>
                        <li><a href="logout.php" id="customer-login">Logout</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
    <div class="profile-cont">
        <h1>Profile</h1>
        <!-- Your profile information display -->
        <h3>Your Customer Id: <?php echo $row["Customer_id"]; ?></h3>
        <h3>Name: <?php echo $row["Full_name"]; ?></h3>
        <h3>Address:</h3>
        <p>State: <?php echo $row["State"] ?></p>
        <p>City /village: <?php echo $row["City_village"] ?></p>
        <p>District: <?php echo $row["District"] ?></p>
        <p>Pin: <?php echo $row["Pin"] ?></p>
        <h3>Mobile No: <?php echo $row["Mobile"]; ?></h3>
        <h3>Email Id: <?php echo $row["Email"]; ?></h3>
        <h3 id="pass">Your Password: <?php echo $row["Password"]; ?></h3>
        <!-- Delete Profile Button -->
        <!-- Delete Profile Button -->
<form id="deleteProfileForm" method="post" onsubmit="return confirmDelete()">
    <input type="hidden" name="Customer_id" value="<?php echo $row["Customer_id"]; ?>">
    <button type="submit" class="delete-profile-button">Delete Profile</button>
</form>


        <!-- Edit Profile Button -->
    </div>
    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete your profile? This action cannot be undone.");
    }
</script>
</body>

</html>
