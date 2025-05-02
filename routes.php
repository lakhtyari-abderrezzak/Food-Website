<?php 


$router->add('/', 'controllers/guest.php');
$router->add('/categories', 'controllers/categories/index.php');
$router->add('/food', 'controllers/food/index.php');
$router->add('/contact', 'controllers/contact.php');

// Admin routes

$router->add('/dashboard', 'admin/controllers/dashboard.php');


// login and register routes
$router->add('/login', 'controllers/auth/login.php');
$router->add('/logout', 'controllers/auth/logout.php');
$router->add('/register', 'controllers/auth/register.php');

