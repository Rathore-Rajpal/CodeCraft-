<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch admin information
function fetchAdminInfo($conn) {
    $sql = "SELECT * FROM admininfo LIMIT 1"; // Assuming there's only one admin
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return null;
    }
}

// Fetch admin information
$adminInfo = fetchAdminInfo($conn);

// Close connection
$conn->close();
?>
