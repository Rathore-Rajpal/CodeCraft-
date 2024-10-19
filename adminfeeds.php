<?php
$to = "rajpalrathore4455@gmail.com";
$subject = "Test mail";
$message = "This is simple Mail";
$from = "codecraft4455@gmail.com";
$headers = "From: $from";
mail($to, $subject, $message, $headers);
echo "Mail Sent";
?>
