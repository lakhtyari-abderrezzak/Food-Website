<?php 

use Middleware\AuthMiddleware;

require_once './bootstrap.php';

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

// Fetch all foods from the database

$stmt = $conn->prepare("SELECT food.*, categories.title AS category_name 
    FROM food 
    JOIN categories ON food.category_id = categories.id ");
$stmt->execute();
$foods = $stmt ->fetchAll(PDO::FETCH_ASSOC);

// Fetch all categories from the database
$categories = $conn->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);


require_once './admin/views/foods/index.view.php';
