<?php 


$router->add('/', 'controllers/guest.php');

// categories routes
$router->add('/categories', 'controllers/categories/index.php');
$router->add('/categories/show', 'controllers/categories/show.php');

// foods routes
$router->add('/food', 'controllers/food/index.php');
$router->add('/food/show', 'controllers/food/show.php');

// Conatact routes
$router->add('/contact', 'controllers/contact.php');

// Admin routes
$router->add('/dashboard', 'admin/controllers/dashboard.php');


// Cart routes
$router->add('/cart', 'controllers/cart/index.php');
$router->add('/cart/add', 'controllers/cart/add.php');  


// login and register routes
$router->add('/login', 'controllers/auth/login.php');
$router->add('/logout', 'controllers/auth/logout.php');
$router->add('/register', 'controllers/auth/register.php');

$router->add('/forgot-password', 'controllers/auth/forgot-password.php');
$router->add('/reset-password', 'controllers/auth/send-reset-password.php');
