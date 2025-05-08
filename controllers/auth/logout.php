<?php
session_start();

require_once './config.php';

$sql = "SELECT * FROM `admin` WHERE email = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->execute([$_SESSION['user']['email']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if ($user) {
    // Clear the remember_me fields in the database
    $stmt = $conn->prepare("UPDATE `admin` SET remember_selector = NULL, remember_token = NULL, remember_expires = NULL WHERE email = ?");
    $stmt->execute([$_SESSION['user']['email']]);
}

// Remove all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Clear the "remember_me" cookie (if set)
if (isset($_COOKIE['remember_me'])) {
    setcookie('remember_me', '', time() - 3600, "/", "", true, true);
}



header('Location: /login');
exit;
