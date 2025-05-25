<?php


require_once './bootstrap.php';

$cartItems = $_SESSION['cart'] ?? [];
$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];
    $quantity = max(1, (int)$_POST['quantity']);

    // Check if the index is valid
    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;
        $_SESSION['message'] = 'Cart updated successfully.';
    } else {
        $_SESSION['message'] = 'Item not found in cart.';
    }

    header('Location: /cart');
    exit;
}