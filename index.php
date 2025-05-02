<?php 

require_once 'Core/Router.php';
require_once 'functions/functions.php';

$router = new Router();

// Load all routes
require 'routes.php';

// Get the requested URI (excluding query strings like ?id=1)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
$router->route($uri);