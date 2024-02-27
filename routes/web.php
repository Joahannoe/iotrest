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

$router->get('users',['middleware' => 'ath','uses' => 'UsersController@index']);
$router->get('users/{id}','UsersController@show');
$router->post('users','UsersController@store');
$router->put('users/{id}','UsersController@update');
$router->delete('users/{id}','UsersController@destroy');

$router->get('actuators','actuatorsController@index');
$router->get('actuators/{id}','actuatorsController@show');
$router->post('actuators','actuatorsController@store');
$router->put('actuators/{id}','actuatorsController@update');
$router->delete('actuators/{id}','actuatorsController@destroy');

$router->post('login','AuthController@login');


function recurso($router, $url, $modelo){
    $router->get("$url",$modelo."Controller@index");
    $router->get("$url/{id}",$modelo."Controller@show");
    $router->post("$url",$modelo."Controller@store");
    $router->put("$url/{id}",$modelo."Controller@update");
    $router->delete("$url/{id}",$modelo."Controller@destroy");
}

$router->group(['middleware' => 'auth'], function () use ($router) {
    recurso($router, 'users', 'Users');
    recurso($router, 'sensors', 'Sensors');
    recurso($router, 'actuators', 'Actuators');
});