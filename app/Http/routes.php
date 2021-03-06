<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(
    array(
        'prefix' => 'api/v1/',
        'namespace' => 'Api\v1',
    ),
    function () {

        Route::post('oath', 'UsersController@oAuth');

        Route::get('locations/ip-find', 'LocationsController@findByIp');
        Route::resource('locations', 'LocationsController');


        Route::resource('users', 'UsersController');



    }
);