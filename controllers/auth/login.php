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

    if (empty($email)) {
        $errors['email'] = 'Please fill in email field.';
    }
    if (empty($password)) {
        $errors['password'] = 'Please fill in password field.';
    }

    if(!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: /login');
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM `admin` WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user && password_verify($password, $user['password'])){

        $_SESSION['user'] = [
            'name' => $user['name'],
            'email' => $user['email']
        ];
        header('Location: /dashboard');
        exit;
    } else {
        $errors['login'] = 'Invalid email or password.';
    }


    $_SESSION['errors'] = $errors;
}

require_once 'views/auth/login.view.php';