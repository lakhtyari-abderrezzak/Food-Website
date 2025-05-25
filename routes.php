<?php 


$router->add('/', 'controllers/welcome.php');

// categories routes
$router->add('/categories', 'controllers/categories/index.php');
$router->add('/categories/show', 'controllers/categories/show.php');

// foods routes
$router->add('/food', 'controllers/food/index.php');
$router->add('/food/show', 'controllers/food/show.php');

// Conatact routes
$router->add('/contact', 'controllers/contact.php');
$router->add('/send-message', 'controllers/contact/send-message.php');


// Admin routes
$router->add('/dashboard', 'admin/controllers/dashboard.php');
// Admin food routes 
$router->add('/dashboard/foods', 'admin/controllers/food/index.php');
$router->add('/dashboard/foods/create', 'admin/controllers/food/create.php');
$router->add('/dashboard/foods/store', 'admin/controllers/food/store.php');
$router->add('/dashboard/foods/edit', 'admin/controllers/food/edit.php');
$router->add('/dashboard/foods/update', 'admin/controllers/food/update.php');
$router->add('/dashboard/foods/delete', 'admin/controllers/food/delete.php');

// Admin Categories routes
$router->add('/dashboard/categories', 'admin/controllers/categories/index.php');
$router->add('/dashboard/categories/create', 'admin/controllers/categories/create.php');
$router->add('/dashboard/categories/store', 'admin/controllers/categories/store.php');
$router->add('/dashboard/categories/edit', 'admin/controllers/categories/edit.php');
$router->add('/dashboard/categories/update', 'admin/controllers/categories/update.php');
$router->add('/dashboard/categories/delete', 'admin/controllers/categories/delete.php');

// Cart routes
$router->add('/cart', 'controllers/cart/index.php');
$router->add('/add-to-cart', 'controllers/cart/add-to-cart.php');  
$router->add('/remove-from-cart', 'controllers/cart/remove-from-cart.php');
$router->add('/update-cart', 'controllers/cart/update-cart.php');
$router->add('/checkout', 'controllers/cart/checkout.php');
$router->add('/process-checkout', 'controllers/cart/process-checkout.php');


// login and register routes
$router->add('/login', 'controllers/auth/login.php');
$router->add('/logout', 'controllers/auth/logout.php');
$router->add('/register', 'controllers/auth/register.php');

$router->add('/forgot-password', 'controllers/auth/forgot-password.php');
$router->add('/send-reset-password', 'controllers/auth/send-reset-password.php');
$router->add('/reset-password', 'controllers/auth/reset-password.php');
$router->add('/process-reset-password', 'controllers/auth/process-reset-password.php');
$router->add('/activation', 'controllers/auth/account-activation.php');
$router->add('/register-success', 'controllers/auth/register-success.php');
$router->add('/activation-success', 'controllers/auth/activation-success.php');