<?php 

require_once './bootstrap.php';
use Middleware\AuthMiddleware;
require './middleware/AuthMiddleware.php';
$auth = new AuthMiddleware();
$auth->handle();

// fetch all categories from the database
$categories = $conn->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);


require_once './admin/views/foods/create.view.php';