<?php 

require_once './bootstrap.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index'];

    // Check if the index is valid
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['message'] = 'Item removed from cart.';
    } else {
        $_SESSION['message'] = 'Item not found in cart.';
    }

    header('Location: /cart');
    exit;
}