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
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url(12.jpg) no-repeat;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
       

        #main {
    margin: 10px; /* Reset margin */
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
    animation: fadeIn 0.5s ease forwards;
    position:absolute;
    top: 350px;
    left:750px;
}


        #header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }
        #feedback {
         padding: 20px;
         text-align: center; /* Center the content */
        }

        /* Table Styles */
        table {
            width: 1400px;
            height: 480px;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            width: 100px;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .edit-btn, .delete-btn {
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            background-color: #007bff;
            color: #fff;
            border: none;
        }

        .edit-btn:hover, .delete-btn:hover {
            background-color: #0056b3;
        }

        /* Popup Form Styles */
        #popupForm {
            display: none;
            position: fixed;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            animation: fadeIn 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.5);
            }
            to {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }

        #popupForm h2 {
            margin-top: 0;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
            width: calc(100% - 22px);
        }

        input[type="submit"], button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #0056b3;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #777;
        }

        .close-btn:hover {
            color: #333;
        }
    </style>
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
            <h1>User Feedback</h1>
        </div>

        <div id="feedback">
            <table>
                <tr>
                    <th>Sr. No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Feedback</th>
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
                $sql = "SELECT * FROM feedback";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["sr.no"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["feedback"] . "</td>";
                        echo "<td><button class='edit-btn' onclick='showResponseForm(" . $row["sr.no"] . ")'>Response</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No feedback yet.</td></tr>";
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
        <h2>Admin Response Form</h2>
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
            $sql = "UPDATE feedback SET response='$adminResponse' WHERE `sr.no`='$srNo'";

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
