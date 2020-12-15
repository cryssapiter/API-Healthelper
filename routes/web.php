<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('/key', function() {
    return \Illuminate\Support\Str::random(32);
});

// Fitur register dan login
$router->post("/register", "AuthController@register");
$router->post("/login", "AuthController@login");

// Route untuk mengakses token
$router->get("/user", "UserController@index"); 

// Read pada tabel paket
$router->post('/pakets', 'PaketController@store');
$router->get("/pakets", "PaketController@index");
$router->get("/pakets/{id_paket}", "PaketController@show");

// CRUD pada tabel articles
$router->get('/artikel', 'artikelController@index');
$router->get('/artikel/{id_artikel}', 'artikelController@show');
$router->post('/artikel', 'artikelController@store');
$router->put('/artikel/{id_artikel}', 'artikelController@update');
$router->delete('/artikel/{id_artikel}', 'artikelController@destroy');

// CRUD pada tabel psikolog
$router->get('/psikolog', 'psikologController@index');
$router->get('/psikolog/{id_psikolog}', 'psikologController@show');
$router->post('/psikolog', 'psikologController@store');
$router->put('/psikolog/{id_psikolog}', 'psikologController@update');
$router->delete('/psikolog/{id_psikolog}', 'psikologController@destroy');

// CRUD pada tabel order
$router->get('/order', 'orderController@index');
$router->get('/order/{id_order}', 'orderController@show');
$router->post('/order', 'orderController@store');
$router->put('/order/{id_order}', 'orderController@update');
$router->delete('/order/{id_order}', 'orderController@destroy');
