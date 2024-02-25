<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/taquilla', 'taquilla::index');
$routes->post('taquilla/insertarPelicula', 'Taquilla::insertarPelicula');
$routes->post('taquilla/insertarBoleto', 'Taquilla::insertarBoleto');