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


Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');
Route::resource ('tickets', 'TicketsController', ['only'=>['store','destroy']]);
Route::resource ('tickets', 'TicketsController');
//Route::get('/getUserTickets/{id}','UsersController@getUserTickets');
Route::get('getJson',  'UsersController@getJson')->name('getJson');
Route::get('queryAllTickets','UsersController@queryAllTickets')->name('queryAllTickets');
Route::get('queryUserTickets/{user}','UsersController@queryUserTickets')->name('queryUserTickets');
//Route::get('echarts', 'EchartsController@firstShow');