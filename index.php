<?php

require __DIR__ . '/vendor/autoload.php';

use App\Services\Bootstrap;
use App\Services\Router;

// Initialize System
$bootstrap = new Bootstrap();
$bootstrap->boot();

// Handle Routing
$router = new Router($bootstrap);
$router->handle();
