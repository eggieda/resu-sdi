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

Route::get('/work-order/create', 'WorkOrderController@create')->name('work-order.create');
Route::post('/work-order', 'WorkOrderController@store')->name('work-order.store');
Route::get('/work-order/{id}', 'WorkOrderController@edit')->name('work-order.edit');
Route::put('/work-order/{id}', 'WorkOrderController@update')->name('work-order.update');