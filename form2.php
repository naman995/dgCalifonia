<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'siddharths502@gmail.com'; // SMTP username
    $mail->Password = 'qlyzkyebeeteoazv'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient
    $mail->setFrom('siddharths502@gmail.com', 'Siddhartha'); // Sender's email address and name
    $mail->addAddress('siddharths502@gmail.com', 'Siddhartha Shrivastava'); // Recipient's email address and name

    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'New form submission';
    $mail->Body = "Name: $name<br>Email: $email<br>Phone: $phone<br>Message: $message";

    // Send email
    if($mail->send()) {
        // Redirect back to the contact page or show a success message
        header("Location: contact.html");
        exit();
    } else {
        // Redirect back to the form page or show an error message
        header("Location: contact.html");
        exit();
    }
} else {
    // Redirect back to the form page or show an error message
    header("Location: thankyou.html");
    exit();
}
?>
