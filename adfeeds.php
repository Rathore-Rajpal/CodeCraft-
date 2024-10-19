<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .popup-form {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ccc;
            z-index: 9999;
        }
        .go-back-btn {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .go-back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>User Feedback</h1>

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
                    echo "<td><button onclick='showResponseForm(" . $row["sr.no"] . ")'>Response</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No feedback yet.</td></tr>";
            }
            $conn->close();
            ?>
        </table>
       
    </div>

    <div id="popupForm" class="popup-form">
        <h2>Admin Response Form</h2>
        <form id="responseForm" method="post" action="save_response.php">
            <input type="hidden" id="srNoInput" name="srNo" value="">
            <label for="adminResponse">Admin Response:</label><br>
            <textarea id="adminResponse" name="adminResponse" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Submit">
            <button onclick="closePopupForm()">Cancel</button>
        </form>
    </div>

    <button class="go-back-btn" onclick="goBack()">Go Back</button>

    <script>
        function showResponseForm(srNo) {
            document.getElementById("srNoInput").value = srNo;
            document.getElementById("popupForm").style.display = "block";
        }

        function closePopupForm() {
            document.getElementById("popupForm").style.display = "none";
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
