<?php
$conn = mysqli_connect("localhost","root","", "users") or die("connection failed");
 $sql = "SELECT `srno`, `fname`, `lname`, `username`, `email` FROM `users`";
 $result = mysqli_query($conn,$sql) or die("SQL Query failed");
 $output = "";
 if(mysqli_num_rows($result) > 0){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding = "10px">
    <tr>
    <th width="60px">Id</th>
    <th>Fname</th>
    <th>Lname</th>
    <th>username</th>
    <th>E-mail</th>
    <th width="90px">Delete</th>
    <th width="90px">Delete</th>
    </tr>';
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row["srno"]}</td>
        <td>{$row["fname"]}</td>
        <td>{$row["lname"]}</td>
        <td>{$row["username"]}</td>
        <td>{$row["email"]}</td>
        <td align='center'><button class='edit-btn' data-eid='{$row["srno"]}'>Edit</button></td>
        <td align='center'><button class='delete-btn' data-id='{$row["srno"]}'>Delete</button></td>
        </tr>";
    }
    $output .= "</table>";
    mysqli_close($conn);
    echo $output;
      
 }else{

    echo "<h2>No Records Found</h2>";

}
?>