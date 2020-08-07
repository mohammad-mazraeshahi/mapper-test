<?php

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

$router->get('/', 'HomeController@index');

$router->group(['prefix' => 'api' ,'as' => 'api.'], function ($router) {
    $router->group(['prefix' => 'v1' , 'as' => 'v1.'], function ($router) {
        $router->get('/products', [
            'uses' => 'ProductController@index',
            'as' => 'products',
        ]);
    });
});

