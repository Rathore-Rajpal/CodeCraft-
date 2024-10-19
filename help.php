<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}

$feed = false;

// Check if form is submitted and the token matches
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Validate token
    if (!empty($_SESSION['form_token']) && $_POST['form_token'] === $_SESSION['form_token']) {
        // Process form submission
        $qe = $_POST['fe'];
        include 'partials/_dbconnect.php';
        $username = $_SESSION['username'];
        $sql = "INSERT INTO `userqueries` (`username`, `question`) VALUES ('$username', '$qe')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $feed = true;
        }
        // Invalidate the token to prevent multiple submissions
        unset($_SESSION['form_token']);
    } else {
        // Invalid or missing token, handle accordingly (optional)
        // For example, you could log an error or redirect the user.
        echo "Invalid form submission.";
        exit;
    }
}

// Generate a new form token
$_SESSION['form_token'] = bin2hex(random_bytes(32));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CodeCraft! FAQ Page</title>
    <link rel="icon" type = "image/x-icon" href="favicon-32x32.png">
    <link rel="stylesheet" href="stylehelp.css">
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
      
    <?php
    if($feed){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Thank You So Much! </strong>We Will Respond Soon !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
<div class="container">
    <h2 class="title"><i class="fa-solid fa-circle-question"></i> Frequently Asked Questions</h2>
    <div class="question" onclick="toggleAnswer('q1')">Q: Which Languages does it supports ?</div>
    <div class="answer" id="q1"><i class="fa-solid fa-arrow-right"></i> Codecraft! is a editor for web developement, so it supports programming Languages such as, HTML5, CSS, and Javascript.<br>
        <i class="fa-solid fa-arrow-right"></i> Although, in the upcoming versions you will definetely find more Languages support.
        <div class="like-dislike">
            <button class="like" onclick="likeAnswer('q1')">👍</button>
            <button class="dislike" onclick="dislikeAnswer('q1')">👎</button>
        </div>
    </div>

    <div class="question" onclick="toggleAnswer('q2')">Q: Which Mode to choose classic or default ?</div>
    <div class="answer" id="q2"><i class="fa-solid fa-arrow-right"></i> It depends, the default mode has a smaller output screen, so it is better to use defaut mode
        when you are using the editor for testing codes and when you are writing the smaller codes.<br>
        <i class="fa-solid fa-arrow-right"></i>Whereas on the other hand the classic mode has a larger output screen, so it can be used for testing as well as for developement 
        purpose and for writing longer codes.
        <div class="like-dislike">
            <button class="like" onclick="likeAnswer('q2')">👍</button>
            <button class="dislike" onclick="dislikeAnswer('q2')">👎</button>
        </div>
    </div>

    <div class="question" onclick="toggleAnswer('q3')">Q: What if dont't log in ?</div>
    <div class="answer" id="q3"><i class="fa-solid fa-arrow-right"></i> If you dont log-in, you can still use the CodeCraft! editor, but you can only use it in default mode, moreover 
        you won't be able to use the download option.<br>
        <i class="fa-solid fa-arrow-right"></i> We, would not recommend you to use CodeCraft without log-in, we would love it if you join us and give us your valuable feedback and support us.<br>
        <div class="like-dislike">
            <button class="like" onclick="likeAnswer('q3')">👍</button>
            <button class="dislike" onclick="dislikeAnswer('q3')">👎</button>
        </div>
    </div>

    <div class="question" onclick="toggleAnswer('q4')">Q: Where is my code saved when i click download button ?</div>
    <div class="answer" id="q4"><i class="fa-solid fa-arrow-right"></i>  In case you are using the default mode, all your codes will be downloaded in text file format, and it
        will reflect in your pc's downloads folder.<br>
        <i class="fa-solid fa-arrow-right"></i>In case you are using the classic mode, your html code will be downloaded as .html file, your css code will be downloaded as .css file,
         and your javascript code will be downloaded as .js file.<br>
         <i class="fa-solid fa-arrow-right"></i> All your files will reflect in your downloads folder.
        <div class="like-dislike">
            <button class="like" onclick="likeAnswer('q4')">👍</button>
            <button class="dislike" onclick="dislikeAnswer('q4')">👎</button>
        </div>
    </div>

    <div class="form-container">
       
        <h3>Any other question related to &nbsp;<i class="fa-solid fa-bug"></i> CodeCraft?</h3>
        <form action="/loginsystem/help.php" method="post">
    <!-- Hidden input field for form token -->
    <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">
    <input type="text" id="question" placeholder="Enter your question" name="fe">
    <br>
    <input type="submit" value="Submit" name="submit">
</form>

        
    </div>
    <br>
  

    <h2 class="title"><i class="fa-solid fa-circle-question"></i> Admin Responses</h2>
        <div class="question"><i class="fa-solid fa-arrow-right"></i>  &nbsp;&nbsp;
<?php
 include 'partials/_dbconnect.php';
 $res;
 $usname = $_SESSION['username'];
 $sql = "SELECT * FROM userqueries where username = '$usname'";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
     // Output data of each row in reverse order
     while($row = $result->fetch_assoc()) {
           $row["response"];
           echo $row["response"];
           
        }
     } else {
     $error = "We will Respond soon";
     }
 
 // Close database connection
 $conn->close();
 ?>
 </div>
</div>

<script>
    function toggleAnswer(id) {
        var answer = document.getElementById(id);
        if (answer.style.display === "block") {
            answer.style.display = "none";
        } else {
            answer.style.display = "block";
        }
    }

    function likeAnswer(id) {
        var likeButton = document.querySelector('#' + id + ' .like');
        var dislikeButton = document.querySelector('#' + id + ' .dislike');
        likeButton.classList.toggle('clicked');
        dislikeButton.classList.remove('clicked');
    }

    function dislikeAnswer(id) {
        var likeButton = document.querySelector('#' + id + ' .like');
        var dislikeButton = document.querySelector('#' + id + ' .dislike');
        dislikeButton.classList.toggle('clicked');
        likeButton.classList.remove('clicked');
    }

    function submitQuestion(event) {
        event.preventDefault();
        var questionInput = document.getElementById('question');
        var message = document.getElementById('message');
        if (questionInput.value.trim() !== '') {
            message.style.display = 'block';
            questionInput.value = '';
        }
    }
</script>

</body>
</html>
