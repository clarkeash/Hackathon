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

Route::get('/', 'LoginController@showLogin');
Route::post('/', 'LoginController@login');

Route::get('logout', 'LoginController@logout');

Route::get('dashboard', 'DashboardController@dashboard');

Route::get('tickets/{tickets}/close', 'TicketController@destroy');
Route::resource('tickets', 'TicketController');