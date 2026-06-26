<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->setAutoRoute(false);

$routes->get('/', 'Page::home');
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
$routes->get('/tos', 'Page::tos');

$routes->get('/artikel', 'Artikel::index');
$routes->get('/artikel/(:any)', 'Artikel::view/$1');

$routes->get('/user/login', 'User::login');
$routes->post('/user/login', 'User::login');
$routes->get('/user/logout', 'User::logout');

// PERBAIKAN: Menghapus filter auth pada group admin
$routes->group('admin', function ($routes) {
    $routes->get('artikel', 'Artikel::admin_index');
    $routes->add('artikel/add', 'Artikel::add');
    $routes->add('artikel/edit/(:any)', 'Artikel::edit/$1');
    $routes->get('artikel/delete/(:any)', 'Artikel::delete/$1');
});

$routes->get('ajax/getData', 'Ajax::getData');
$routes->delete('ajax/delete/(:num)', 'Ajax::delete/$1');

// PERBAIKAN: Menghapus filter apiauth pada rute POST, PUT, dan DELETE
$routes->post('post', 'Api\Post::create');
$routes->put('post/(:segment)', 'Api\Post::update/$1');
$routes->delete('post/(:segment)', 'Api\Post::delete/$1');

$routes->get('post', 'Api\Post::index');
$routes->get('post/(:segment)', 'Api\Post::show/$1');

$routes->post('api/login', 'Api\Auth::login');

// PERBAIKAN: Menghapus filter auth pada rute dashboard admin
$routes->get('admin/dashboard', 'Artikel::dashboard');

$routes->options('(:any)', function() {
    return response()
        ->setHeader('Access-Control-Allow-Origin', '*')
        ->setHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->setHeader('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With, Accept')
        ->setStatusCode(200);
});