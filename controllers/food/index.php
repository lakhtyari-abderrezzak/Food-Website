<?php
require_once './config.php';

$search = $_GET['search'] ?? '';

// Prepare the search term for SQL LIKE query
$searchTerm = '%' . $search . '%';
// Fetching food items based on search term

// Fetching all food items from the database
$stmt = $conn->prepare("SELECT * FROM food WHERE food.title LIKE :search ORDER BY id DESC");

$stmt->bindParam(':search', $searchTerm);
$stmt->execute();
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);


// Include the view to display the food items
require './views/food/index.view.php';
