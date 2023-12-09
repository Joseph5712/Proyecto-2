<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */


// app/Config/Routes.php
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/salir', 'AuthController::salir');

$routes->get('/category', 'categoryController::index');
$routes->get('/category/create', 'categoryController::create');
$routes->post('/category/save', 'categoryController::save');
$routes->get('/category/edit/(:num)', 'categoryController::edit/$1');
$routes->get('/category/delete/(:num)', 'categoryController::delete/$1');


$routes->get('/user', 'UserController::index');



