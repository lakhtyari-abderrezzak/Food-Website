<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once './vendor/autoload.php';


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;


    $mail->Username   = 'acmem04@gmail.com';
    $mail->Password   = 'hijmlqlgvhjozztu';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
    $mail->Port       = 587;

    $mail->isHTML(true);

    return $mail;

} catch (Exception $e) {
    echo "Mailer setup failed: {$mail->ErrorInfo}";
    return null;
}
