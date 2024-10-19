<?php
$user_Id = $_POST["ids"];
$user_fname = $_POST["fnames"];
$user_lname = $_POST["lnames"];
$user_username = $_POST["usnames"];
$user_email = $_POST["emails"];
$conn = mysqli_connect("localhost","root","", "users") or die("connection failed");
$sql = "UPDATE users SET fname = '{$user_fname}', lname = '{$user_lname}', username = '{$user_username}', email = '{$user_email}' WHERE srno = {$user_Id}";

 if(mysqli_query($conn,$sql)){
    echo 1;
 }else{
    echo 0;
 }
?>