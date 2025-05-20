<?php 

use Middleware\AuthMiddleware;

require_once './bootstrap.php';

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

// Fetch all foods from the database

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sort_by = isset($_GET['sort_by']) ? trim($_GET['sort_by']) : 'id';

if ($search) {
    $sql = "SELECT food.*, categories.title AS category_name 
        FROM food 
        JOIN categories ON food.category_id = categories.id 
        WHERE food.title LIKE '%$search%' ORDER BY $sort_by DESC ";
    
} else {
    $sql = "SELECT food.*, categories.title AS category_name 
        FROM food 
        JOIN categories ON food.category_id = categories.id
        ORDER BY $sort_by DESC
        ";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
$foods = $stmt ->fetchAll(PDO::FETCH_ASSOC);

// Fetch all categories from the database
$categories = $conn->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);


require_once './admin/views/foods/index.view.php';
