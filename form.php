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

    // Recipient
    $recipient_email = 'siddharths502@gmail.com'; // Your email address

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

    // Recipient
    $mail->addAddress($recipient_email); // Add your email address as the recipient

    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'New form submission';
    $mail->Body = "Name: $name<br>Email: $email<br>Phone: $phone<br>Message: $message";

    // Send email to recipient
    if($mail->send()) {
        // Create a new PHPMailer instance for confirmation email
        $confirmation_mail = new PHPMailer();

        // Set up SMTP configuration for confirmation email
        $confirmation_mail->isSMTP();
        $confirmation_mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
        $confirmation_mail->SMTPAuth = true;
        $confirmation_mail->Username = 'siddharths502@gmail.com'; // SMTP username
        $confirmation_mail->Password = 'qlyzkyebeeteoazv'; // SMTP password
        $confirmation_mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $confirmation_mail->Port = 587; // TCP port to connect to

        // Sender and recipient for confirmation email
        $confirmation_mail->setFrom('siddharths502@gmail.com', 'Siddhartha'); // Sender's email address and name
        $confirmation_mail->addAddress($email, $name); // Recipient's email address and name

        // Email content for confirmation email
        $confirmation_mail->isHTML(true); // Set email format to HTML
        $confirmation_mail->Subject = 'Confirmation of form submission';
        $confirmation_mail->Body = "Dear $name,<br>Your message has been received successfully.<br><br>Here is a copy of your message";

        // Send confirmation email
        $confirmation_mail->send();

        // Redirect back to the contact page or show a success message
        header("Location: thankyou.html");
        exit();
    } else {
        // Redirect back to the form page or show an error message
        header("Location: contact.html");
        exit();
    }
} else {
    // Redirect back to the form page or show an error message
    header("Location: contact.html");
    exit();
}
?>
