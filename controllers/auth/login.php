<?php
session_start();
require_once 'config.php';

if (isset($_SESSION['user'])) {
    header('Location: /');
    exit;
}
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    $remember_me = isset($_POST['remember_me']);

    if (empty($email)) {
        $errors['email'] = 'Please fill in email field.';
    }
    if (empty($password)) {
        $errors['password'] = 'Please fill in password field.';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: /login');
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and verify the password
    // Also check if the account is activated (account_activation_hash is null)
    if ($user && password_verify($password, $user['password']) && $user['account_activation_hash'] === null) {

        $_SESSION['user'] = [
            'name' => $user['name'],
            'email' => $user['email']
        ];

        if ($remember_me) {
            // Generate a random selector and validator
            $selector = bin2hex(random_bytes(6));
            $validator = bin2hex(random_bytes(32));
            $hashedValidator = hash('sha256', $validator);
            $expires = date('Y-m-d H:i:s', time() + (86400 * 30)); // 30 days

            $stmt = $conn->prepare("UPDATE `admin` SET remember_selector = ?, remember_token = ?, remember_expires = ? WHERE email = ?");
            $stmt->execute([$selector, $hashedValidator, $expires, $email]);

            setcookie('remember_me', "$selector:$validator", time() + (86400 * 30), "/", "", true, true);

        }
        header('Location: /dashboard');
        exit;
    } else {
        $errors['login'] = 'Invalid email or password.';
    }


    $_SESSION['login_errors'] = $errors;
}

require_once 'views/auth/login.view.php';