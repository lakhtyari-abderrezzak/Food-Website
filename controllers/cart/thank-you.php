<?php 

require_once 'controllers/stripe/stripe_config.php'; 

// Check if session_id is passed
if (!isset($_GET['session_id'])) {
    echo "No session ID provided.";
    exit;
}

$session_id = $_GET['session_id'];

try {

    // Retrieve the session from Stripe
    $session = \Stripe\Checkout\Session::retrieve($session_id);

    // Check if the session is successful
    if ($session->payment_status === 'paid') {
        // Payment was successful, proceed with order processing
        $order_id = $session->metadata->order_id;
        $email = $session->metadata->customer_email;

        // Clear the cart 
        unset($_SESSION['cart']);

        // Redirect to thank you page
        require_once dirname(__DIR__, 2) . '/views/cart/thank-you.view.php';

    } else {
        echo "Payment not completed.";
    }
} catch (Exception $e) {
    echo "Error retrieving session: " . $e->getMessage();
}
