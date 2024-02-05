<?php
require 'connection/config.php';
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
                    <th>Customer ID</th>
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
