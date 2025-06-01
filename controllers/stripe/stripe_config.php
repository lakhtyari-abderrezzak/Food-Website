<?php
require 'vendor/autoload.php'; 

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET']); 
