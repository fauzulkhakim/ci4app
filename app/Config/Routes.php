<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
// $routes->get('/pages', 'Pages::index');
// $routes->get('/pages/about', 'Pages::about');
// $routes->get('/pages/contact', 'Pages::contact');
// $routes->get('/komik', 'Komik::index');
$routes->delete('/komik/(:num)', 'Komik::delete/$1');
// $routes->get('/komik/detail/(:any)', 'Komik::detail/$1');
// $routes->get('/komik/create', 'Komik::create');
$routes->get('/komik/edit/(:segment)', 'Komik::edit/$1');
// $routes->post('/komik/save', 'Komik::save');
