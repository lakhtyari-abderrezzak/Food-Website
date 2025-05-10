<?php

require_once './bootstrap.php';

use Middleware\AuthMiddleware;

require './middleware/AuthMiddleware.php';

$auth = new AuthMiddleware();

$auth->handle();

require './admin/views/dashboard.view.php';
