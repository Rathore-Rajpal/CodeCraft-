<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $_SESSION['fname'] = $fname;
   
   // $exists=false;
    //check weather this username exists
    
    $existsSql = "SELECT * from `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existsSql);
    $nunExitsRows = mysqli_num_rows($result);
    if($nunExitsRows > 0){
        //$exists = true;
        $showError = "Username already exists";
    }
     else{
       // $exists = false;
     if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`fname`, `lname`,`username`,`email`, `password`, `dt`) VALUES ('$fname', '$lname', '$username','$email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
    }
    
?>
    

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesign.css">
    <script src="https://kit.fontawesome.com/d01fd9c369.js" crossorigin="anonymous"></script>
    <title>CodeCraft signup</title>
    <link rel="icon" type = "image/x-icon" href="favicon-32x32.png">
  </head>
  <body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

    <div class="container my-4">
    <h1 class="text-center">&nbsp;<i class="fa-solid fa-bug"></i> CodeCraft!</h1>
     <form action="/loginsystem/signup.php" method="post">

     <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" maxlength="11" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
            <label for="sname">Last Name</label>
            <input type="text" maxlength="11" class="form-control" id="lname" name="lname" aria-describedby="emailHelp">
            </div>
            

        <div class="form-group">
            <label for="username">Select-Username</label>
            <input type="text" maxlength="30" class="form-control" id="username" name="username" aria-describedby="emailHelp">
            </div>
            
        <div class="form-group">
            <label for="username">E-mail</label>
            <input type="email" maxlength="30" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" maxlength="23" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            
        </div>
         
        <button type="submit" class="btn btn-primary">SignUp</button>
        <button type="reset" class="btn btn-primary">Reset</button>
     </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>