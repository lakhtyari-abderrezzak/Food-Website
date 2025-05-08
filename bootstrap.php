
<?php
session_start();
$config  = require_once __DIR__ . '/config.php';

// Remember Me auto-login logic
if (!isset($_SESSION['user']) && isset($_COOKIE['remember_me'])) {
    list($selector, $validator) = explode(':', $_COOKIE['remember_me']);

    $stmt = $conn->prepare("SELECT * FROM admin WHERE remember_selector = ? AND remember_expires >= NOW()");
    $stmt->execute([$selector]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && hash_equals($user['remember_token'], hash('sha256', $validator))) {
        $_SESSION['user'] = [
            'name' => $user['fullname'],
            'email' => $user['email']
        ];
    } else {
        setcookie('remember_me', '', time() - 3600, '/');
    }
}
