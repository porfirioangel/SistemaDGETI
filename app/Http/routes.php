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
    return view('landingpage');
});

Route::get('/dashboard', function () {
    return view('dashboard_master');
});




Route::get('/definitivo', function () {
    return view('docente_definitivo');
});



//Login
Route::get('login', ['as' => 'login', 'uses' => 'LoginController@index']);
Route::resource('log', 'LoginController');


Route::get('logout', ['as' => 'auth.logout', 'uses' => 'LoginController@logout']);