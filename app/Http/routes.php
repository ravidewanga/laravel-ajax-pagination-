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
    return view('welcome');
});

Route::post('add-user','Admin_ctrl@add_user');

Route::get('get-list','Admin_ctrl@getList');

Route::post('get-name-list','Admin_ctrl@nameList');