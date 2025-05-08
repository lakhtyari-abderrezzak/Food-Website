<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user'])) {
    header('Location: /');
    exit;
}

// Include DB connection
require_once 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirmation = $_POST['password_confirmation'];



    //  Validation
    if (empty($username) || strlen($username) < 3) {
        $errors['name'] = 'Name should be at least 3 characters long';
    } elseif (strlen($username) > 255) {
        $errors['name'] = 'Name should be less than 255 characters';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is not valid';
    }

    // Check if email already exists
    $stmt = $conn->prepare('SELECT * FROM `admin` WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($existing_user) {
        $errors['email'] = 'Email already exists';
    }

    if (empty($password) || strlen($password) < 6) {
        $errors['password'] = 'Password should be at least 6 characters long';
    }

    if ($password !== $password_confirmation) {
        $errors['password_confirmation'] = 'Password confirmation does not match';
    }

    // If no errors, insert into DB
    if (empty($errors)) {
        require_once 'config.php'; // Ensure $pdo exists
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $activation_token = bin2hex(random_bytes(16)); // Generate a random token
        $activation_token_hash = hash('sha256', $activation_token); // Hash the token for storage
        
        $stmt = $conn->prepare('INSERT INTO `admin` (username, email, `password`, account_activation_hash) VALUES (?, ?, ?, ?)');
        $stmt->execute([$username, $email, $hashed_password, $activation_token_hash]);
        if ($stmt->rowCount() > 0) {
            require_once  './controllers/mail.php';
        
            $activation_link = 'http://localhost:8888/activation?token=' . $activation_token;
            $mail->setFrom('noreply@gmail.com', 'Food App');
            $mail->addAddress($_POST['email']);
            $mail->Subject = 'Activate Your Account';
        
            $mail->Body =  <<<END
        
                <p>Hi,</p>
                <p>Thank you for registering. Click the link below to activate your account:</p>
                <p><a href="$activation_link">Click here</a></p>
                <p>If you did not request this, please ignore this email.</p>
                <p>Thank you!</p>
            END;

            require_once './views/auth/register-success.view.php';
        
            try{
                $mail->send();
            } catch (Exception $e) {
                echo "Mailer Error: {$mail->ErrorInfo}";
            }
        }
        
    } else {
        $_SESSION['register_errors'] = $errors;
        $_SESSION['old'] = [
            'name' => $username,
            'email' => $email
        ];
        header('Location: /register');
        exit;
    }
}

// Load the view 
require 'views/auth/register.view.php';
