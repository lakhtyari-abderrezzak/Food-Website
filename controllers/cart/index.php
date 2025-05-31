<?php 

require_once './bootstrap.php';

$cartItems = $_SESSION['cart'] ?? [];
$total = 0;

function clearCart() {
    unset($_SESSION['cart']);
}

require_once './views/cart/index.view.php';