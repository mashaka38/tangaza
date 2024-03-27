<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust this path according to your file structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com'; // Set your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@example.com'; // SMTP username
        $mail->Password   = 'your_password'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; // Check your SMTP port

        //Recipients
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('to@example.com', 'Receiver'); // Add a recipient

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body    = 'Name: ' . $name . '<br>Email: ' . $email . '<br>Message: ' . $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
