<?php 

require_once './bootstrap.php';

$cartItems = $_SESSION['cart'] ?? [];
$total = 0;

require_once './views/cart/index.view.php';