<?php
require 'connection/config.php';

if (!empty( $_SESSION["id"])) {
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "SELECT * FROM admins WHERE id=$id");
    $customerRow = mysqli_fetch_assoc($result);
} else {
    header("Location: admin_login.php");
}

// Get the selected location from the URL parameter
$selectedLocation = isset($_GET['location']) ? $_GET['location'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farm Tools Rent || Admin Dashboard</title>
    <style>
    </style>
</head>
<body>

    <header>
        <h1>Farm Tools Rent || Admin Dashboard</h1>
    </header>
    <nav>
        <a href="#">Dashboard</a> |
        <a href="#">Products</a> |
        <a href="#">Orders</a> |
        <a href="admin_logout.php">Logout</a>
    </nav>
    <section>
       
        <h2>Welcome, <?php echo $customerRow["username"];?>!</h2>
        
    </section>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Farm Tools Rent Admin Dashboard</p>
    </footer>
</body>
</html>
