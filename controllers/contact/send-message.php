<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input
    $name = htmlspecialchars(strip_tags(trim($_POST["name"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST["message"])));

    // Validate input
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        require_once './controllers/mail.php'; // Assumes $mail is already initialized inside this file

        $mail->setFrom($email, 'Food App Contact');
        $mail->addAddress('acmem04@gmail.com');
        $mail->Subject = 'New Contact Form Submission';

        // Email body (HTML)
        $mail->isHTML(true);
        $mail->Body = <<<END
            <p>Hi Admin,</p>
            <p>You have received a new message via the contact form on the Food App site.</p>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
            <p>Thank you!</p>
        END;

        try {
            $mail->send();
            $_SESSION['success'] = 'Message sent successfully!';
            header('Location: /contact'); // Redirect back to contact page
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Please fill all fields correctly.";
    }
} else {
    echo "Invalid request.";
}
