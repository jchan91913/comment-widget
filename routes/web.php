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

// Comment homepage
Route::get('/', 'CommentController@showHome');
// Retrieve last five comments
Route::get('/comment/last-five', 'CommentController@getLastFive');
// Create a new comment
Route::post('/comment/create', 'CommentController@store');