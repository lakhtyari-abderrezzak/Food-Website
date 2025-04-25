<?php 


$router->add('/', 'controllers/guest.php');
$router->add('/categories', 'controllers/categories/index.php');
$router->add('/categories/{$id}', 'controllers/admin/show.php');
$router->add('/categories/{$id}', 'controllers/admin/edit.php');
$router->add('/dashboard/create', 'controllers/admin/create.php');
