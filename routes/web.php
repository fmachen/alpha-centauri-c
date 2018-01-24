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

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/spaceship', 'SpaceshipController@index')->name('spaceship.list');
Route::get('/spaceship/build', 'SpaceshipController@build')->name('spaceship.new');
Route::get('/spaceship/{name}', 'SpaceshipController@show')->name('spaceship.show');
Route::get('/spaceship/{name}/build', 'SpaceshipController@show')->name('spaceship.build');
Route::get('/spaceship/{name}/crew', 'SpaceshipController@crew')->name('spaceship.crew');
Route::get('/spaceship/{name}/map', 'SpaceshipController@map')->name('spaceship.map');
Route::get('/spaceship/{name}/jump', 'SpaceshipController@jump')->name('spaceship.jump');
