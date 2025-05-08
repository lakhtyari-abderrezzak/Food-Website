<?php 

session_start();

$token = $_GET['token'];

$token_hash = hash('sha256', $token);

require_once './config.php';

$sql = "SELECT * FROM `admin` WHERE reset_token_hash = ? LIMIT 1";

$stmt = $conn->prepare($sql);;
$stmt->execute([$token_hash]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$result) {
    // Token is invalid or expired
    header('Location: /login');
    exit;
}

// Chechk if Token is Expired 
if(strtotime($result['reset_token_expires_at']) <= time()){
    // Token is expired
    header('Location: /login');
    exit;
}

require_once './views/auth/reset-password.view.php';

unset($_SESSION['reset_errors']);