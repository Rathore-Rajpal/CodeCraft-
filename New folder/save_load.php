<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}

// Database connection
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

$username = $_SESSION['username']; // Retrieve username from session

// Handle save action
if ($_POST['action'] == 'save') {
    $filename = $_POST['filename'];
    $htmlCode = $_POST['html'];
    $cssCode = $_POST['css'];
    $jsCode = $_POST['js'];
    
    // Insert or update codes in the database
    $sql = "REPLACE INTO codes (username, filename, html_code, css_code, js_code) VALUES ('$username', '$filename', '$htmlCode', '$cssCode', '$jsCode')";
    if ($conn->query($sql) === TRUE) {
        echo "Codes saved successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Handle load action
elseif ($_POST['action'] == 'load') {
    $filename = $_POST['filename'];
    
    // Retrieve codes from the database
    $sql = "SELECT html_code, css_code, js_code FROM codes WHERE username='$username' AND filename='$filename'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $htmlCode = $row['html'];
        $cssCode = $row['css'];
        $jsCode = $row['js'];

        // Output the codes back to the HTML page
        echo json_encode(array('htmlCode' => $htmlCode, 'cssCode' => $cssCode, 'jsCode' => $jsCode));
    } else {
        echo "Codes not found.";
    }
}

$conn->close();
?>
