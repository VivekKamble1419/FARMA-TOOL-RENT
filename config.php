<?php
session_start();

// Attempt to establish a connection
$conn = mysqli_connect("localhost", "root", "", "farma");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Continue with the rest of your code
// ...

?>
