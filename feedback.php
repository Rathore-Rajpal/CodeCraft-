<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
?>
<?php
$feed=FALSE;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"];
    $sql = "INSERT INTO `feedback` (`username`, `email`, `feedback` ) VALUES ( '$username', '$email', ' $feedback')";
    $result = mysqli_query($conn, $sql);
    if(isset($result)){
      $feed=TRUE;
    }
}
    
?>

<!DOCTYPE <!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CodeCraft! feedback</title>
        <link rel="icon" type = "image/x-icon" href="favicon-32x32.png">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="feeds.css">

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
          <a class="nav-link active" aria-current="page" href="/loginsystem/welcome1.php"><i class="fa-solid fa-house"></i> Home</a>
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
  <strong>Thank You So Much! </strong>valuable feedback submitted sucessfully!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
    <br>
    <h1><center>Give Your valuable Feedback</center></h1>
    <form action="/loginsystem/feedback.php" method="post">
    <div class="container my-4">
    <div class="form-group">
        <i class="bi bi-file-lock-fill"></i>
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?php echo $_SESSION['username']?>" style="width: 400px;" required>
    </div><br>

    <div class="form-group">
        <label for="e-mail">Email..</label>
        <input type="email" class="form-control" id="email" name="email" style="width: 400px;" required>
    </div><br>
    
    <div class="form-group">
        <label for="exampleFormControlTextarea1" class="form-label">Your feedback...!</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="feedback" style="width: 500px;"></textarea>
    </div>
    <br><br>
    
    <label for="ratings" class="rating">Your Ratingsss...!</label>
    <div class="rate">
        <input type="radio" id="star5" name="rate" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value="1" />
        <label for="star1" title="text">1 star</label>
    </div>
    <br><br><br>
    
    <div class="abc">
        <button type="submit" class="btn btn-primary">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" class="btn btn-primary">Reset</button>
    </div>
</div>

        
        
    </body>
</html>