<?php 

session_start();

$id = $_GET['id'] ?? null;

if(!$id){
    header('Location: 404.php');
    exit;
}

require_once 'config.php';

$stmt = $conn->prepare("SELECT * FROM categories WHERE id = ? LIMIT 1");
$stmt->execute([$id]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$category){
    header('Location: 404.php');
    exit;
} 

$stmt = $conn->prepare("SELECT * FROM food WHERE category_id = ? LIMIT 20");
$stmt->execute([$id]);
$foods = $stmt->fetchAll(PDO::FETCH_ASSOC);


require_once 'views/categories/show.view.php';