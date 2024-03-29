<?php
require 'connection/config.php';


if (!empty($_SESSION['Seller_id'])) {
    $Seller_id = $_SESSION['Seller_id'];

    // Fetch seller details before deletion
    $result = mysqli_query($conn, "SELECT * FROM s_signup WHERE Seller_id = $Seller_id");
    $row = mysqli_fetch_assoc($result);

    // Check if the delete button is clicked
    if (isset($_POST['delete_profile'])) {
        // Delete the seller profile
        $deleteQuery = "DELETE FROM s_signup WHERE Seller_id = $Seller_id";
        mysqli_query($conn, $deleteQuery);

        // Close the session
        session_destroy();

        // Redirect to login page
        header("Location: Seller_login.php");
        exit();
    }
} else {
    // If the user is not logged in, redirect to the login page
    header("Location: Seller_Dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Profile</title>
    <link rel="shortcut icon" href="./Images/fab.jpg" />

    <link rel="stylesheet" href="Css/Profile.css">
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
                        <li><a href="Seller_Dashboard.php" id="customer-login">Home</a></li>
                        <li><a href="logout.php" id="customer-login">Logout</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
    <div class="profile-cont">
        <h1>Profile</h1>
        <h3>Your Seller Id : <?php echo $row["Seller_id"]; ?></h3>
        <h3>Seller Name : <?php echo $row["Full_name"]; ?></h3>
        <h3>Seller Address :</h3>
        <p>State : <?php echo $row["State"] ?></p>
        <p>City /village : <?php echo $row["City_village"] ?></p>
        <p>District : <?php echo $row["District"] ?></p>
        <p>Pin : <?php echo $row["Pin"] ?></p>
        <h3>Seller Mobile No : <?php echo $row["Mobile"]; ?></h3>
        <h3>Seller Email Id : <?php echo $row["Email"]; ?></h3>
        <h3 id="pass">Your Password : <?php echo $row["Password"]; ?></h3>

        <!-- Add a form for the delete button -->
        <form method="post" onsubmit="return confirmDelete()">
            <button type="submit" name="delete_profile">Delete Profile</button>
        </form>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete your profile?");
        }
    </script>

</body>
</html>
