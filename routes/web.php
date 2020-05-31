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
Route::apiResource('/user', 'UserController');
Route::apiResource('/shares', 'SharesController');
Route::post('/register', 'RegisterController@post');
Route::post('/login', 'LoginController@post');
Route::post('/logout', 'LogoutController@post');
Route::get('/user', 'UserController@get');
Route::put('/user', 'UserController@put');
Route::post('/like', 'LikeController@post');
Route::delete('/like', 'LikeController@delete');
Route::post('/comments', 'CommentsController@post');
