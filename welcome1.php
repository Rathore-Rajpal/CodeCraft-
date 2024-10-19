<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="icon" type = "image/x-icon" href="favicon-32x32.png">
         <link rel="stylesheet" href="wells.css">
         <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
         <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="hero">

            <video autoplay loop muted plays-inline class="back-video">
                <source src="background1.mp4" type="video/mp4" >
            </video>

             <nav>
                <img src = "logo1.png" class = "logo">
                <ul>
                    <li><a href="/loginsystem/New folder/default.php"><i class="fa-solid fa-code"></i>&nbsp; Default Mode!</a></li>
                    <li><a href="/loginsystem/classic.html"><i class="fa-solid fa-users"></i>&nbsp; Classic Mode!</a></li>
                    <li><a href="/loginsystem/snips.html"><i class="fa-solid fa-sheet-plastic"></i></i>&nbsp; Code Snippets</a></li>
                    <li><a href="/loginsystem/aboutus.html"><i class="fa-solid fa-envelope"></i>&nbsp; About us</a></li>
                   <li><a href="/loginsystem/feedback.php" target="_blank"><i class="fa-solid fa-comment"></i>&nbsp; Feedback</a></li>
                    <li><a href="/loginsystem/help.php"><i class="fa-brands fa-searchengin"></i> Help ?</a></li>
                    <li><a href="/loginsystem/profile.php"><i class="fa-solid fa-user"></i>&nbsp; Profile</a></li>
                    <li><a href="logout.php" id="logout-btn"><i class="fa-solid fa-heart-crack"></i>&nbsp; logout</a></li>
                </ul>
             </nav>
             <div class="content">
             <h1><i class="fa-solid fa-bug"></i>CodeCraft!</h1>
             <div class="typing-container">
             <i class="fa-brands fa-html5"></i> Begin your coding Journey! <i class="fa-brands fa-js"></i>
            </div>
            <div class="wrapper">
    <div class="typing-demo">
        <?php echo $_SESSION['username'] ?>
    </div>
</div>
                
                
             </div>
             <div class="button-container">
                <a href="/loginsystem/New folder/default.php" class="button"><i class="fa-solid fa-bug-slash"></i> Click to Code</a>
                <a href="explore.html" class="button"><i class="fa-solid fa-magnifying-glass-arrow-right"></i> Explore Themes</a>
                </div>
                <div class="social-icon">
                <a href="https://www.instagram.com/code._.craftt/"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="https://www.youtube.com/channel/UC-vMxSi3GghhJQcCNc4eALg"><i class='bx bxl-youtube'></i></a>
                <a href="https://www.instagram.com/code._.craftt/"><i class='bx bxl-instagram'></i></a>
                <a href="https://www.linkedin.com/in/rajpal-rathore-4293151b6/"><i class='bx bxl-linkedin'></i></a>
            </div>
            <!-- <div class="slider-container"> -->
    <!-- <div class="title"><i class="fa-solid fa-comment"></i> User's Feedbacks</div>
    <div class="slider">
 <?php
include 'partials/_dbconnect.php';

// SQL query to fetch the last five feedback entries in descending order
$sql = "SELECT * FROM feedback ORDER BY `sr.no` DESC LIMIT 5";
$result = $conn->query($sql);

// Check if there are any feedback entries
if ($result->num_rows > 0) {
    // Output data of each row in reverse order
    while($row = $result->fetch_assoc()) {
        echo '<div class="slide">';
        echo '<div class="feedback">';
        echo "<p>Username: " . $row["username"]. "</p>";
        echo "<p>Email: " . $row["email"]. "</p>";
        echo "<p>Feedback: " . $row["feedback"]. "</p>";
        
        // Check if response exists
        if(!empty($row["response"])) {
            echo "<p>Admin's Response: " . $row["response"]. "</p>";
        } else {
            echo "<p> Admin's Response: We will respond soon</p>";
        }
        
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No feedback entries found";
}

// Close database connection
$conn->close();
?> 

    </div>
    <br>
    <div class="navigation"></div>
    
</div>

<script>
    let slider = document.querySelector('.slider');
    let slides = document.querySelectorAll('.slide');
    let slideWidth = slides[0].clientWidth;
    let slideIndex = 0;
    let navigation = document.querySelector('.navigation');

    function createNavButtons() {
        for (let i = 0; i < slides.length; i++) {
            let btn = document.createElement('div');
            btn.classList.add('nav-btn');
            if (i === slideIndex) {
                btn.classList.add('active');
            }
            btn.addEventListener('click', () => {
                slideIndex = i;
                updateSlider();
                updateNavButtons();
            });
            navigation.appendChild(btn);
        }
    }

    function updateSlider() {
        slider.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
    }

    function updateNavButtons() {
        let buttons = document.querySelectorAll('.nav-btn');
        buttons.forEach((btn, index) => {
            if (index === slideIndex) {
                btn.classList.add('active');
            } else {
                btn.classList.remove('active');
            }
        });
    }

    createNavButtons();

    setInterval(() => {
        slideIndex++;
        if (slideIndex >= slides.length) {
            slideIndex = 0;
        }
        updateSlider();
        updateNavButtons();
    }, 4000); // Change slide every 4 seconds
</script>
<script>
    document.getElementById("logout-btn").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent the default behavior of the link

        // Show a confirmation dialog with customized message
        var confirmation = confirm(" Dear, <?php echo $_SESSION['username']?> Are you sure you want to logout?");
        
        // If the user confirms, redirect to the logout page
        if (confirmation) {
            window.location.href = "/loginsystem/logout.php";
        }
    });
</script>

    </div>
   
</body>
 </html> 
                     
        
    

        

