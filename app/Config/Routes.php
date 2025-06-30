<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Artikel Routes
$routes->get('artikel', 'ArtikelController::index');
$routes->get('artikel/create', 'ArtikelController::create');
$routes->post('artikel/store', 'ArtikelController::store');
$routes->get('artikel/edit/(:num)', 'ArtikelController::edit/$1');
$routes->post('artikel/update/(:num)', 'ArtikelController::update/$1');
$routes->get('artikel/delete/(:num)', 'ArtikelController::delete/$1');

$routes->get('feedback', 'FeedbackController::index');
$routes->get('feedback/form', 'FeedbackController::form');
$routes->post('feedback/store', 'FeedbackController::store');
$routes->get('feedback/delete/(:num)', 'FeedbackController::delete/$1');
