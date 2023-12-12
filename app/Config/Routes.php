<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */


// app/Config/Routes.php

$routes->post('/login', 'AuthController::login');
$routes->get('/salir', 'AuthController::salir');
$routes->get('/create_user', 'AuthController::show_form_user');
$routes->post('/create_user', 'AuthController::save_user');
$routes->post('/user/search', 'NewsController::search');




$routes->get('/', 'AuthController::index');
$routes->get('/category', 'categoryController::index');
$routes->get('/category/create', 'categoryController::create');
$routes->post('/category/save', 'categoryController::save');
$routes->get('/category/edit/(:num)', 'categoryController::edit/$1');
$routes->get('/category/delete/(:num)', 'categoryController::delete/$1');

$routes->get('/', 'UserController::index');
$routes->get('/user/form_news_sources', 'UserController::show_sources_input');
$routes->post('/user/save', 'UserController::save');
$routes->get('/user/news_sources', 'UserController::show_sources');

$routes->get('/user/edit/(:num)', 'UserController::edit/$1');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');

$routes->get('/user', 'NewsController::index');
$routes->get('/user/(:num)/(:any)/(:num)/(:num)', 'UserController::add_news/$1/$2/$3/$4');





//hay que hacer las rutas para crear-eliminar-editar las news sources


