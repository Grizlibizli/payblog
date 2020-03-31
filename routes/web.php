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

Route::get('/', 'HomeController@index');

// Driver
Route::match(['get', 'post'], '/add/driver', 'TaxiDriverController@add')->name('addDrivers');
Route::get('/driver', 'TaxiDriverController@index');

// Car
Route::match(['get', 'post'], '/add/car', 'CarController@add')->name('addCars');
Route::get('/car', 'CarController@index');
