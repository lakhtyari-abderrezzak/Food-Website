<?php

session_start();

$errors = [];

// Get the token and passwords from POST
$token = $_POST['token'] ?? '';


$token_hash = hash('sha256', $token);

require_once './config.php';

$sql = "SELECT * FROM `admin` WHERE reset_token_hash = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([$token_hash]);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result || strtotime($result['reset_token_expires_at']) <= time()) {
    header('Location: /login');
    exit;
}

$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

// Validate passwords
if (empty($password) || strlen($password) < 6) {
    $errors['password'] = "Password must be at least 6 characters long.";
}

if ($password !== $password_confirmation) {
    $errors['password_confirmation'] = "Passwords do not match.";
}

if(empty($errors)){
   
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    $sql = 'UPDATE `admin` SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE reset_token_hash = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$hashed_password, $token_hash]);
    
    header('Location: /login');
    exit;

}else{
    $_SESSION['reset_errors'] = $errors;
    header('Location: /reset-password?token=' . $token);
    exit;
}

