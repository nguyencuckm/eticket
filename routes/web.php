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


Route::get('home',['as'=>'home','uses'=>'ClientController@index']);
/*Login client*/
Route::get('/',['as'=>'login','uses'=>'ClientController@getlogin']);
Route::post('/',['as'=>'login','uses'=>'ClientController@postlogin']);
Route::get('register',['as'=>'register','uses'=>'ClientController@getregister']);
Route::post('register',['as'=>'register','uses'=>'ClientController@postregister']);
Route::get('logout',['as'=>'logout','uses'=>'ClientController@getlogout']);
Route::get('dashboard',['as'=>'dashboard','uses'=>'ClientController@dashboard']);