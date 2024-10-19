<?php
$user_Id = $_POST["id"];
$conn = mysqli_connect("localhost","root","", "users") or die("connection failed");
 $sql = "DELETE FROM users WHERE srno = {$user_Id}";

 if(mysqli_query($conn,$sql)){
    echo 1;
 }else{
    echo 0;
 }
?>