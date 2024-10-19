<?php
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$user_name = $_POST["user_name"];
$email_name = $_POST["emails"];
$conn = mysqli_connect("localhost","root","", "users") or die("connection failed");
$sql = "INSERT INTO users(fname,lname,username,email) VALUES ('{$first_name}','{$last_name}','{$user_name}','{$email_name}')";
//$result = mysqli_query($conn,$sql) or die("SQL Query failed");
if( mysqli_query($conn,$sql)){
    echo 1;
}else{
    echo 0;
}
?>