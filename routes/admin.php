<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMN Routes
|--------------------------------------------------------------------------
|
| Here is where you can register ADMN routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "admin" middleware group. Enjoy building your API!
|
*/
Route::get('/', 'App\Http\Controllers\Admin\DashboardAdminController@index')->name('admin.dashboard');
Route::get('/get-api-weather/search', 'App\Http\Controllers\Admin\DashboardAdminController@search')->name('admin.search');

// login
Route::get('/login', 'App\Http\Controllers\Admin\DashboardAdminController@login');

// all
Route::get('/all', 'App\Http\Controllers\Admin\PageAdminController@all')->name('admin.page.all');

