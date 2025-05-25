<?php
require_once './bootstrap.php';


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: /cart.php');
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$cart = $_SESSION['cart'];
$total = 0;

foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, customer_address, total) VALUES (?, ?, ?, ?)");
$stmt->execute([$name, $email, $address, $total]);
$order_id = $conn->lastInsertId();

// Insert order items
$stmt = $conn->prepare("INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)");
foreach ($cart as $item) {
    $stmt->execute([
        $order_id,
        $item['id'],
        $item['quantity'],
        $item['price']
    ]);
}

require_once './controllers/mail.php';
 
$mail->setFrom('no-reply@food-app.com', 'Food App');
$mail->addAddress($email, $name);
$mail->Subject = 'Order Confirmation';
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Body = require_once './views/emails/email-confirmation.view.php';

try{
    $mail->send();
} catch (Exception $e) {
    error_log("Mailer Error: {$mail->ErrorInfo}");
}

// Clear cart
unset($_SESSION['cart']);
$_SESSION['message'] = "Thank you! Your order has been placed.";
header("Location: /thank-you.php");
exit;
