<?php

// Get the recipient's email address, subject, and message from the form data
$to = $_POST['r_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];  

// Get the sender's name and email address from the form data
$sender_name = $_POST['s_name'];
$sender_email = $_POST['s_email'];

// Generate a random hash value using the md5 function and the current date and time
$random_hash = md5(date('r', time())); 

// Construct the email headers by concatenating the sender's name, email address, and the boundary value
$headers = "From: " . $sender_name . "<" . $sender_email . ">";
$headers .= "\r\nContent-Type: ipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 

// Send the email
$mail_sent = mail($to, $subject, $message, $headers);

// Display a message based on the result of the mail function
if ($mail_sent) {
    echo "Email sent successfully";
} else {
    echo "Error sending email";
}

?>
