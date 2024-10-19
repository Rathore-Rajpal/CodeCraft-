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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>CodeCraft! Dark</title>
    <link rel="icon" type="image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="dark1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
   
</head>
<body>
    <p><b><i class="fa-solid fa-bug"></i>&nbsp;&nbsp;CodeCraft!</b></p>
    
    <header class="header">
    <nav class="navbar">
            <a href="/loginsystem/welcome1.php"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/loginsystem/feedback.php" target="_blank"><i class="fa-solid fa-comment"></i> Feedback ?</a>
            <a href="/loginsystem/help.html" target="_blank"><i class="fa-solid fa-circle-question"></i> Help</a>
            <a href="/loginsystem/classic.html" target="_blank"><i class="fa-solid fa-boxes-stacked"></i> Classic Mode</a>
            <a href="light.php" target="_blank"><i class="fa-solid fa-sun"></i> Light theme</a>
            <a href="default.php" target="_blank"><i class="fa-solid fa-code"></i> Default theme</a>
             
        </nav>
       
    </header>
    <div class="container">
        <div class="left">
            <label> <i class="fa-brands fa-html5"></i>HTML</label>
            <textarea id="html-code" onkeyup="run()"> </textarea>
            <button class="button-851" onclick="download('html-code')"><i class="fa-solid fa-download"></i>&nbsp; HTML</button>
            
            <label> <i class="fa-brands fa-css3-alt"></i>CSS</label>
            <textarea id="css-code" onkeyup="run()"> </textarea>
            <button class="button-852" onclick="download('css-code')"><i class="fa-solid fa-download"></i>&nbsp; CSS</button>
            
            <label> <i class="fa-brands fa-js"></i>Javascript</label>
            <textarea id="java-code" onkeyup="run()"> </textarea>
            <button class="button-853" onclick="download('java-code')"><i class="fa-solid fa-download"></i>&nbsp; JavaScript</button>
              
            </div>
            <div class="boxi">
            <div id="charCount">Total Characters Typed: 0</div><br>
            <div id="typingSpeed">Average Typing Speed: 0 characters per minute</div>
            </div>
        
        <div class="right">
            <label class="xyz"><i class="fa-regular fa-circle-play"></i> Output</label>
            <iframe id="output"></iframe>
        </div>
        <!-- Stopwatch -->
        <div class="stopwatch">
                <p id="display"> 00:00:00</p>
                <div id="butt"><i class="fa-solid fa-stopwatch"></i> 
                    <button class="button" onclick="resetStopwatch()">Reset</button>
                </div>
    </div>
    <script type="text/javascript" src="count.js"></script>
    <script>
        // Stopwatch functionality
        let timer;
        let typingTimeout; // To handle typing pause
        let hours = 0;
        let minutes = 0;
        let seconds = 0;

        function startStopwatch() {
            if (!timer) {
                timer = setInterval(runTimer, 1000);
            }
        }

        function runTimer() {
            seconds++;
            if (seconds === 60) {
                seconds = 0;
                minutes++;
                if (minutes === 60) {
                    minutes = 0;
                    hours++;
                }
            }
            displayTime();
        }

        function displayTime() {
            let display = document.getElementById('display');
            display.textContent = (hours < 10 ? "0" + hours : hours) + ":" +
                (minutes < 10 ? "0" + minutes : minutes) + ":" +
                (seconds < 10 ? "0" + seconds : seconds);
        }

        function resetStopwatch() {
            clearInterval(timer);
            timer = null;
            hours = minutes = seconds = 0;
            displayTime();
        }

        // Function to execute code
        function run() {
            clearTimeout(typingTimeout); // Clear previous timeout
            startStopwatch(); // Start stopwatch whenever a key is pressed

            typingTimeout = setTimeout(() => {
                clearInterval(timer); // Pause stopwatch after typing stops
                timer = null;
                calculateTypingSpeed();
            }, 1000); // Adjust timeout delay as needed

            let htmlCode = document.getElementById("html-code").value;
            let cssCode = document.getElementById("css-code").value;
            let jsCode = document.getElementById("java-code").value;
            let output = document.getElementById("output");
            output.contentDocument.body.innerHTML = htmlCode + "<style>" + cssCode + "</style>";
            output.contentWindow.eval(jsCode);
        }

        // Function to calculate average typing speed
        function calculateTypingSpeed() {
            let totalCharactersTyped = document.getElementById("charCount").textContent.split(":")[1].trim();
            let totalTimeInSeconds = (hours * 3600) + (minutes * 60) + seconds;
            let totalTimeInMinutes = totalTimeInSeconds / 60;
            let averageSpeed = totalCharactersTyped / totalTimeInMinutes;
            let typingSpeedDisplay = document.getElementById("typingSpeed");
            typingSpeedDisplay.textContent = "Average Typing Speed: " + averageSpeed.toFixed(2) + " characters per minute";
        }

        // Function to download code
        function download(id) {
            let content = document.getElementById(id).value;
            let blob = new Blob([content], { type: "text/plain" });
            let url = URL.createObjectURL(blob);
            let a = document.createElement('a');
            a.href = url;
            a.download = id + ".txt";
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</body>
</html>
