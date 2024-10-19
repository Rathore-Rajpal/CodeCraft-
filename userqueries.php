<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <link rel="icon" type = "image/x-icon" href="favicon-32x32.png">
    link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="styleqe.css">
       
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-bug"></i>&nbsp;&nbsp;CodeCraft!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/loginsystem/welcome1.php"> <i class="fa-solid fa-house"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/loginsystem/New folder/default.php"> <i class="fa-solid fa-code"></i> Editor!</a>
          </li>
        </ul>
      </div>
    </div>
</nav>

<div id="main">
        <div id="header">
            <h1>User Queries</h1>
        </div>

        <div id="feedback">
            <table>
                <tr>
                    <th>Sr. No</th>
                    <th>User-Name</th>
                    <th>Question</th>
                    <th>Action</th>
                </tr>
                <?php
                // PHP script to fetch feedback data from the database
                $servername = "localhost";
                $username = "root"; // Replace with your MySQL username
                $password = ""; // Replace with your MySQL password
                $database = "users"; // Replace with your MySQL database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch feedback data from the database
                $sql = "SELECT * FROM userqueries";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["srno"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["question"] . "</td>";
                        echo "<td><button class='edit-btn' onclick='showResponseForm(" . $row["srno"] . ")'>Response</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No Questions</td></tr>";
                }
                $conn->close();
                ?>
            </table>
            <br>
            <a class="btn btn-primary" href="insert-data.php" role="button"><i class="fa-solid fa-backward"></i> Go Back</a>
        </div>
     </div>
    
    <div id="popupForm">
        <span class="close-btn" onclick="closePopupForm()">&times;</span>
        <h2>Admin Response Form: </h2>
        <form id="responseForm" method="post">
            <input type="hidden" id="srNoInput" name="srNo" value="">
            <label for="adminResponse">Admin Response:</label><br>
            <textarea id="adminResponse" name="adminResponse" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Submit">
            <button type="button" onclick="closePopupForm()">Close</button>
        </form>
    </div>
    
    <script>
        function showResponseForm(srNo) {
            document.getElementById("srNoInput").value = srNo;
            document.getElementById("popupForm").style.display = "block";
        }

        function closePopupForm() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $srNo = $_POST["srNo"];
        $adminResponse = $_POST["adminResponse"];

        // Validate if the fields are not empty
        if (empty($srNo) || empty($adminResponse)) {
            echo "<script>alert('Error: Sr. No and Admin Response fields are required.')</script>";
        } else {
            // Database connection parameters
            $servername = "localhost";
            $username = "root"; // Replace with your MySQL username
            $password = ""; // Replace with your MySQL password
            $database = "users"; // Replace with your MySQL database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Prepare SQL statement to update the feedback table
            $sql = "UPDATE userqueries SET response='$adminResponse' WHERE `srno`='$srNo'";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Response saved successfully')</script>";
                echo "<script>window.location.href = window.location.href;</script>";
            } else {
                echo "<script>alert('Error updating record: " . $conn->error . "')</script>";
            }

            $conn->close();
        }
    }
    ?>
</body>
</html>
