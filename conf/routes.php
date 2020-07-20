<?php
use ePHP\Core\Route;

$route = Route::init();

$route->auto(\App\Controllers\IndexController::class);

// RESTful router
// match GET /user/188/info to UserController@info
$route->get('/user/:id/info', \App\Controllers\IndexController::class, 'index');

// match GET /fe/user/188/info to UserController@info
$route->prefix('/fe')->get('/user/:id(\d+)/info', \App\Controllers\IndexController::class, 'echo');

// $route->post('/user/:id(\d+)', \App\Controllers\UserController::class, 'add');
// $route->put('/user/:id(\d+)', \App\Controllers\UserController::class, 'edit');
// $route->delete('/user/:id(\d+)', \App\Controllers\UserController::class, 'delete');

// // Match all method http request /user/188/info
// $route->all('/user/:id(\d+)/info', \App\Controllers\UserController::class, 'index');

// // Auto router
// // route GET /api/info/188 to ApiController@info
// // route POST /api/info/188 to ApiController@info
// // route POST /api/tree/188 to ApiController@tree
$route->auto(\App\Controllers\ApiController::class);

// // Prefix router, Supports: auto-router, RESTful-router
// // route GET /be/api/info/188 to ApiController@info
// // route POST /be/api/info/188 to ApiController@info
// // route POST /be/api/tree/188 to ApiController@tree
// $route->prefix('/be')->auto(\App\Controllers\Backend\ApiController::class);
$route->prefix('/be')->auto(\App\Controllers\ApiController::class);

// WebSocket Support demo
// Websocket demo html page
$route->get('/websocket', \App\Controllers\WebSocket\EchoController::class, 'index');

// Websocket protocol, handle route '/'
$route->websocket('/echo', \App\Controllers\WebSocket\EchoController::class);

