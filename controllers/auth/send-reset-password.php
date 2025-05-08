<?php 

$email = $_POST['email'];

$token = bin2hex(random_bytes(16));

$token_hash = hash('sha256', $token);

$expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

$mysqli = require './config.php';


$sql = "Update admin SET reset_token_hash = ?, reset_token_expires_at = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$token_hash, $expires, $email]);

if ($stmt->rowCount() > 0) {
    require_once  './controllers/mail.php';

    $reset_link = 'http://localhost:8888/reset-password?token=' . $token;
    $mail->setFrom('acmem04@gmail.com', 'Food App');
    $mail->addAddress($email);
    $mail->Subject = 'Password Reset Request';

    $mail->Body =  <<<END

        <p>Hi,</p>
        <p>You requested a password reset. Click the link below to reset your password:</p>
        <p><a href="$reset_link">Click here</a></p>
        <p>If you did not request this, please ignore this email.</p>
        <p>Thank you!</p>
    END;

    try{
        $mail->send();
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
}

echo 'Message has been sent';