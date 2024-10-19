<?php
session_start();

// Database connection parameters
$servername = "localhost"; // Change this to your server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "users"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST request
    $htmlCode = $_POST['html_code'];
    $cssCode = $_POST['css_code'];
    $javaCode = $_POST['java_code'];
    $filename = $_POST['filename'];
    $username = $_SESSION['username'];

    // Prepare SQL statement to insert data into the database
    $sql = "INSERT INTO codes (username, html, css, js, filename) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("sssss", $username, $htmlCode, $cssCode, $javaCode, $filename);
    $stmt->execute();

    // Close the statement
    $stmt->close();
    
    // Close the connection
    $conn->close();
    
    // Redirect to the desired page after saving the data
    header("Location: default.php");
    exit;
} else {
    // Redirect to the desired page if accessed directly without form submission
    header("Location: desired_page.php");
    exit;
}
?>
