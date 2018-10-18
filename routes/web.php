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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/orders/export/{transfer}', 'OrderController@export')->name('order-export');
Route::resource('transfers', 'TransferController');
Route::resource('orders', 'OrderController');
Route::post('/send', 'EmailController@send');


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('transfers', 'Admin\TransferController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('schedules', 'Admin\ScheduleController');
   
});

