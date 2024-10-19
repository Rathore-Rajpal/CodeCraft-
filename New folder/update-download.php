<?php
// Include database connection code here
include 'partials/_dbconnect.php';

// Function to update the download count in the database
function updateDownloadCount($conn, $userId) {
    $sql = "UPDATE users SET downloads = downloads + 1 WHERE id = $userId";
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

// Handle AJAX request to update download count
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['userId'])) {
    $userId = $_POST['userId'];
    if (updateDownloadCount($conn, $userId)) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "error"));
    }
    exit;
}
?>
