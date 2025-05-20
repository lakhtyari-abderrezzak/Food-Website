<?php 

use Middleware\AuthMiddleware;

require_once './bootstrap.php';
require './middleware/AuthMiddleware.php';
$auth = new AuthMiddleware();
$auth->handle();

$stmt = $conn->prepare("SELECT * FROM categories WHERE id = :id");
$stmt->execute([':id' => $_GET['id']]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$category) {
    
    header('Location: /dashboard/categories');
    exit();
}

require_once dirname(__DIR__ , 2) . '/views/categories/edit.view.php';