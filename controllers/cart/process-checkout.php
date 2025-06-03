<?php
// Initialize DB and session
require_once './bootstrap.php';

// Ensure required middleware file exists
require_once dirname(__DIR__, 2) . '/middleware/CheckoutMiddleware.php';

// Run middleware
$empty = new Middleware\CheckoutMiddleware();
$empty->handle();


// Collect form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$address = trim($_POST['address']);
$payment_method = $_POST['payment_method'];
$cart = $_SESSION['cart'];
$total = 0;

// Calculate total
foreach ($cart as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Insert into orders table
$stmt = $conn->prepare("INSERT INTO orders (customer_name, customer_email, customer_address, total, payment_method) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$name, $email, $address, $total, $payment_method]);
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

// Send confirmation email
require_once './controllers/mail.php';

$mail->setFrom('no-reply@food-app.com', 'Food App');
$mail->addAddress($email, $name);
$mail->Subject = 'Order Confirmation';
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Body = require_once './views/emails/email-confirmation.view.php';

try {
    // Send the email
    $mail->send();
} catch (Exception $e) {
    // Log the error
    error_log("Mailer Error: {$mail->ErrorInfo}");
}
if ($payment_method === 'card') {
    require_once 'controllers/stripe/stripe_config.php';

    // Create checkout session
    $checkout_session = \Stripe\Checkout\Session::create([
        'line_items' => [
            [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Food Order #' . $order_id,
                    ],
                    'unit_amount' => $total * 100, // Convert to cents
                ],
                'quantity' => 1,
            ],
        ],
        'mode' => 'payment',
        'success_url' => 'http://localhost:8888/thank-you?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => 'http://localhost:8888/cancel',
        'metadata' => [
            'order_id' => $order_id,
            'customer_email' => $email
        ]
    ]);

    unset($_SESSION['cart']);
    
    // Redirect to Stripe payment page
    header("Location: " . $checkout_session->url);
    exit;

}
// If payment method is not card, proceed to thank you page

// Clear cart
unset($_SESSION['cart']);

require_once './views/cart/thank-you.view.php';
exit;
