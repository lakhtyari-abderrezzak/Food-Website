<?php

session_start();



use Middleware\AuthMiddleware;

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

require './admin/views/dashboard.view.php';
