<?php
session_start();
require_once './config.php'; 

$food_id = $_POST['food_id'];
$quantity = max(1, (int)$_POST['quantity']);

// Fetch food info from DB (to store name, price, etc.)
$stmt = $conn->prepare("SELECT * FROM food WHERE id = ?");
$stmt->execute([$food_id]);
$food = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$food) {
    $_SESSION['message'] = 'Food item not found.';
    header('Location: /menu');
    exit;
}

// Initialize cart if not already
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add or update quantity
if (isset($_SESSION['cart'][$food_id])) {
    $_SESSION['cart'][$food_id]['quantity'] += $quantity;
} else {
    $_SESSION['cart'][$food_id] = [
        'id' => $food['id'],
        'title' => $food['title'],
        'price' => $food['price'],
        'image' => $food['image_name'],
        'quantity' => $quantity
    ];
}

$_SESSION['message'] = 'Item added to cart!';
header('Location: /cart');
exit;
