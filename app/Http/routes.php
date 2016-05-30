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

        Route::get('oath', 'Users@oAuth');

        Route::resource('applications-logs', 'ApplicationLogs');
        Route::resource('locations', 'Locations');
        Route::resource('location-types', 'LocationTypes');
        Route::resource('users', 'Users');



    }
);