<?php 

use Middleware\AuthMiddleware;

require_once './bootstrap.php';

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

$stmt = $conn->prepare("DELETE FROM categories WHERE id = :id");
$stmt->bindParam(':id', $_GET['id']);
$stmt->execute();

$_SESSION['success'] = "Category deleted successfully";
header("Location: /dashboard/categories");
exit();

