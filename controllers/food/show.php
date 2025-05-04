<?php 

session_start();

$id = $_GET['id']; 

if(!$id){
    header('Location: /food');
    exit;
}

require_once './config.php';

$stmt =  $conn->prepare('SELECT * FROM food WHERE id = ?');
$stmt->execute([$id]);
$food = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$food){
    header('Location: /food');
    exit;
}

require_once './views/food/show.view.php';