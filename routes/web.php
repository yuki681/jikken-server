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

Route::get('/schedule/{id}', 'SchedulesController@show');
Route::put('/schedule/{id}/soldout', 'SchedulesController@soldout');
Route::put('/schedule/{id}/cancel_soldout', 'SchedulesController@cancel_soldout');
Route::get('/schedule/{date?}', 'SchedulesController@index');
Route::post('/schedule/{id}/review/create', "ReviewsController@create");

Route::redirect('/', url('/schedule'), 301);
