<?php 
require_once dirname(__DIR__, 2) . '/bootstrap.php';

// Ensure required middleware file exists
require_once dirname(__DIR__, 2) . '/middleware/CheckoutMiddleware.php';

// Run middleware
$empty = new Middleware\CheckoutMiddleware();
$empty->handle();


$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}


require_once dirname(__DIR__, 2) . '/views/cart/checkout.view.php';

