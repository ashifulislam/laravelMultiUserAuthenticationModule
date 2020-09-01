<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/player','PlayerController@index')->name('player')->middleware('player');
Route::get('/admin','AdminController@index')->name('admin')->middleware('admin');
Route::get('/superAdmin','SuperAdminController@index')->name('superAdmin')->middleware('superAdmin');
Route::get('/scout','ScoutController@index')->name('scout')->middleware('scout');
Route::get('/team','TeamController@index')->name('team')->middleware('team');
Route::get('/academic','AcademicController@index')->name('academic')->middleware('academic');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
