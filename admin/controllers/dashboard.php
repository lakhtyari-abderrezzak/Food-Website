<?php

require './middleware/AuthMiddleware.php';

use Middleware\AuthMiddleware;

$auth = new AuthMiddleware();

$auth->handle();

require './admin/views/dashboard.view.php';
