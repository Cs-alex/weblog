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

Route::get('/', 'Controller@index');
Route::get('/', 'DashboardController@index');
Route::post('/scheme', 'UserController@scheme');
Route::post('/vote/{seo}', 'UserController@vote');
Route::get('/search/{search}', 'DashboardController@search');
Route::get('/article/{article}', 'ArticleController@article');
Route::get('/about', 'AboutController@index');