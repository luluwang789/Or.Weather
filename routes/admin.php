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
Route::post('/login', 'App\Http\Controllers\Admin\DashboardAdminController@post_login')->name('post.login');
Route::get('/logout', 'App\Http\Controllers\Admin\DashboardAdminController@logout')->name('get.logout');

// all current
Route::get('/all-current', 'App\Http\Controllers\Admin\PageAdminController@all_currnet')->name('admin.page.all-current');
// all day
Route::get('/all-day', 'App\Http\Controllers\Admin\PageAdminController@all_day')->name('admin.page.all-day');
// delete day weather
Route::get('/all-day/delete/{id}', 'App\Http\Controllers\Admin\PageAdminController@delete_day')->name('admin.page.all-day.delete');
// delete current weather
Route::get('/all-current/delete/{id}', 'App\Http\Controllers\Admin\PageAdminController@delete_current')->name('admin.page.all-current.delete');
// find id day model
Route::get('/find/day/{id}', 'App\Http\Controllers\Admin\PageAdminController@find_id_modal_day')->name('admin.page.modal.day');
// find id current model
Route::get('/find/current/{id}', 'App\Http\Controllers\Admin\PageAdminController@find_id_modal_current')->name('admin.page.modal.current');


// search dashboard
Route::get('/map-hour/{city}/{date}', 'App\Http\Controllers\Admin\PageAdminController@map_hour')->name('admin.page.map-hour');
Route::get('/map-day/{city}', 'App\Http\Controllers\Admin\PageAdminController@map_day')->name('admin.page.map-day');

// account
Route::get('/account-setting', 'App\Http\Controllers\Admin\PageAdminController@profile_setting')->name('admin.account-setting');
Route::post('/account-setting/update/{id}', 'App\Http\Controllers\Admin\PageAdminController@profile_update')->name('admin.account-update');