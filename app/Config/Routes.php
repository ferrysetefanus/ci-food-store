<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

// routes for categories
$routes->group('categories', function($routes) {
    $routes->get('category/(:num)', 'Categories\Categories::categoryProducts/$1');
});

// routes for product
$routes->group('products', function($routes) {
    $routes->get('single-product/(:num)', 'Products\Products::productDetails/$1');
    $routes->get('shop', 'Products\Products::shop');
    $routes->post('add-to-cart', 'Products\Products::addToCart', ['as' => 'add.to.cart']);
});
