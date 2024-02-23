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
    //return $router->app->version();
    return "hola mundo";
});

$router->get('users','UsersController@index');
$router->get('users/{id}','UsersController@show');
$router->post('users','UsersController@store');
$router->put('users/{id}','UsersController@update');
$router->delete('users/{id}','UsersController@destroy');

$router->get('sensors','SensorsController@index');
$router->get('sensors/{id}','SensorsController@show');
$router->post('sensors','SensorsController@store');
$router->put('sensors/{id}','SensorsController@update');
$router->delete('sensors/{id}','SensorsController@destroy');

$router->get('actuators','actuatorsController@index');
$router->get('actuators/{id}','actuatorsController@show');
$router->post('actuators','actuatorsController@store');
$router->put('actuators/{id}','actuatorsController@update');
$router->delete('actuators/{id}','actuatorsController@destroy');