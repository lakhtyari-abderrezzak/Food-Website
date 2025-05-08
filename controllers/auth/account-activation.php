<?php
require_once './config.php';
$activation_token = $_GET['token'] ?? null;

$activation_token_hash = hash('sha256', $activation_token);

$sql = "SELECT * FROM `admin` WHERE account_activation_hash = ? LIMIT 1";

$stmt = $conn->prepare($sql);
$stmt->execute([$activation_token_hash]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: /login');
    exit;
}

if($user['account_activation_hash'] !== $activation_token_hash) {
    header('Location: /login');
    exit;
}

// Update the user's account activation status to null (activated)

$sql = "UPDATE `admin` SET account_activation_hash = NULL WHERE account_activation_hash = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$activation_token_hash]);


require_once './views/auth/activation-success.view.php';