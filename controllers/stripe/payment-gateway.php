<?php 

// create-checkout-session.php
require 'stripe_config.php';

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/food-website';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'product_data' => [
        'name' => 'Sample Food Order',
      ],
      'unit_amount' => 2000, // $20.00
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
]);

header("Location: " . $checkout_session->url);
