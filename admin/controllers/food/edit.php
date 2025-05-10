<?php 
require_once './bootstrap.php';
use Middleware\AuthMiddleware;

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();
$auth->handle();

// Fetch all foods from the database
$stmt = $conn->prepare("SELECT * FROM food  where id = :id");
$stmt->execute([
    'id' => $_GET['id']
]);
$food = $stmt ->fetch(PDO::FETCH_ASSOC);


// Fetch all categories from the database
$categories = $conn->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);

require_once './admin/views/foods/edit.view.php';