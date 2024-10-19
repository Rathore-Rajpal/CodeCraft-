<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Feedback Slider</title>
<style>
    * {
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }
    .slider-container {
        width: 80%;
        margin: auto;
        overflow: hidden;
        position: relative;
        max-width: 800px;
        border: 2px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: #f9f9f9;
    }
    .slider {
        width: 100%;
        display: flex;
        transition: transform 0.5s ease;
    }
    .slide {
        flex: 0 0 100%;
        padding: 20px;
        border-radius: 8px;
        margin-right: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease;
        transform-style: preserve-3d;
    }
    .slide:hover {
        transform: rotateY(20deg) translateZ(50px);
    }
    .feedback {
        color: #333;
        font-size: 16px;
        line-height: 1.6;
    }
    .feedback h3 {
        font-size: 20px;
        margin-bottom: 10px;
        color: #333;
    }
    .feedback p {
        margin-bottom: 10px;
    }
    .navigation {
        position: absolute;
        bottom: 10px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .nav-btn {
        width: 10px;
        height: 10px;
        background-color: #ccc;
        border-radius: 50%;
        cursor: pointer;
        margin: 0 5px;
        transition: background-color 0.3s ease;
    }
    .nav-btn.active {
        background-color: #555;
    }
    .title {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
        text-transform: uppercase;
    }
</style>
</head>
<body>

<div class="slider-container">
    <div class="title">User's Feedbacks</div>
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
                echo "<p>Name: " . $row["username"]. "</p>";
                echo "<p>Email: " . $row["email"]. "</p>";
                echo "<p>Message: " . $row["feedback"]. "</p>";
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
    }, 5000); // Change slide every 5 seconds
</script>

</body>
</html>
