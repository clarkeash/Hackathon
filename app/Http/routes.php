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

Route::get('/', 'DashboardController@showLogin');
Route::post('/', 'DashboardController@login');

Route::get('logout', 'DashboardController@logout');

Route::get('dashboard', 'DashboardController@dashboard');
