<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */


// app/Config/Routes.php
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');

$routes->get('/category', 'categoryController::index');
$routes->get('user/dashboard', 'UserController::dashboard');



