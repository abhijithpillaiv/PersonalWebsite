<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // adjust path if not using Composer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'yourgmail@gmail.com';   // your Gmail address
        $mail->Password   = 'your_app_password';     // your Gmail app password (not regular password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('yourgmail@gmail.com', 'Contact Form');
        $mail->addAddress('abhijithvpillai26@gmail.com'); 

        // Content
        $mail->isHTML(false);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body    = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();
        echo 'Message sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
