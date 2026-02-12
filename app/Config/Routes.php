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
    $routes->get('shop', 'Products\Products::shop', ['as' => 'shop']);
    $routes->post('add-to-cart', 'Products\Products::addToCart', ['as' => 'add.to.cart']);

    $routes->get('cart', 'Products\Products::cart', ['as' => 'cart']);

    //delete from cart
    $routes->get('delete-from-cart/(:num)', 'Products\Products::deleteFromCart/$1', ['as' => 'cart.delete']);

    //prepare checkout
    $routes->post('prepare-checkout', 'Products\Products::prepareCheckout', ['as' => 'prepare.checkout']);

    //checkout
    $routes->get('checkout', 'Products\Products::checkout', ['as' => 'checkout', 'filter' => 'checkprice']);

    //process checkout
    $routes->post('process-checkout', 'Products\Products::processCheckout', ['as' => 'process.checkout', 'filter' => 'checkprice']);

    // pay with paypal
    $routes->get('pay-with-paypal', 'Products\Products::payWithPaypal', ['as' => 'pay.with.paypal', 'filter' => 'checkprice']);

    // success page
    $routes->get('success', 'Products\Products::success', ['as' => 'products.success', 'filter' => 'checkprice']);
    
});

$routes->group('users', function($routes) {
    $routes->get('orders', 'Users\UsersInfo::userOrders', ['as' => 'orders.user']);
});

