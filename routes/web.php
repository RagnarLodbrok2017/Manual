<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::post('/logout', 'RegisterLoginController@getLogout');
Route::get('login', 'RegisterLoginController@showLogin');

Route::post('/signup', 'RegisterLoginController@create');
Route::post('/login', 'RegisterLoginController@check');

Route::resource('cars','CarController');
Route::any('cars/{id}',[
    'uses' => 'CarController@category',
    'as' => 'cars',
]);

Route::resource('carsuser','CarsUserController');
Route::get('carsuser/{id}/buy','CarsUserController@buy');
Route::get('userprofile','CarsUserController@profile');
