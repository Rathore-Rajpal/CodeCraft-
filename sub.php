<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
if(isset($_POST['submit']))
{
    $qe = $_POST['fe'] ;
    include 'partials/_dbconnect.php';
    $username = $_SESSION['username'];
    $sql = "INSERT INTO `userqueries` (`username`, `question`) VALUES ( '$username', '$qe')";
    $result = mysqli_query($conn, $sql);
    if(isset($result)){
      $feed=TRUE;
    }
}
?>