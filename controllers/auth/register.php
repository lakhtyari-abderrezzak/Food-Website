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

    // ✅ Validation
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

    if (empty($password) || strlen($password) < 6) {
        $errors['password'] = 'Password should be at least 6 characters long';
    }

    if ($password !== $password_confirmation) {
        $errors['password_confirmation'] = 'Password confirmation does not match';
    }

    // ✅ If no errors, insert into DB
    if (empty($errors)) {
        require_once 'config.php'; // Ensure $pdo exists
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare('INSERT INTO `admin` (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $hashed_password]);

        $_SESSION['user'] = [
            'name' => $username,
            'email' => $email
        ];

        header('Location: /');
        exit;
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = [
            'name' => $username,
            'email' => $email
        ];
        header('Location: /register');
        exit;
    }
}

// Load the view (after logic)
require 'views/auth/register.view.php';
