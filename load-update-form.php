<?php
 $userIds =  $_POST["id"];
 $conn = mysqli_connect("localhost","root","", "users") or die("connection failed");
 $sql = "SELECT `srno`, `fname`, `lname`, `username`, `email` FROM `users` WHERE  `srno` = {$userIds}";
 $result = mysqli_query($conn,$sql) or die("SQL Query failed");
 $output = "";
 if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_assoc($result)){
        $output .= " <tr>
        <td>First Name: </td>
        <td><input type='text' id='edit-fname' value='{$row["fname"]}'>
        <input type='text' id='edit-id' hidden value='{$row["srno"]}'></td>
    </tr>
    <tr>
        <td>Last Name: </td>
        <td><input type='text' id='edit-lname'  value='{$row["lname"]}'></td>
    </tr>
    <tr>
        <td>Username Name: </td>
        <td><input type='text' id='edit-uname'  value='{$row["username"]}'></td>
    </tr>
    <tr>
        <td>Email: </td>
        <td><input type='text' id='edit-email'  value='{$row["email"]}'></td>
    </tr>
    <tr>
        <td></td>
        <td><input type='submit' id='edit-submit' value='save'></td>
    </tr>";
    }
  
    mysqli_close($conn);
    echo $output;
      
 }else{

    echo "<h2>No Records Found</h2>";

}
?>