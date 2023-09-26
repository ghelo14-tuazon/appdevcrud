<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/test', 'MainController::test');
$routes->get('/create', 'MainController::create');
$routes->post('/create/save', 'MainController::save');
$routes->get('/delete/(:any)', 'MainController::delete/$1');
$routes->get('/update/(:any)', 'MainController::update/$1'); 
$routes->post('/update/save', 'MainController::saveUpdate'); 
$routes->get('/add-category', 'MainController::addCategory');
$routes->post('/save-category', 'MainController::saveCategory');





