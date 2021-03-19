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
//
Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('views/register', function () {
    return view('register');
})->name('register');
Route::get('add',function(){
    return view('goodsadd');
})->middleware('loginstatus');

Route::any('/user/login','App\Http\Controllers\Usercontroller@login')->name('login');
Route::any('/user/register','App\Http\Controllers\Usercontroller@register');
Route::any('user/logout','App\Http\Controllers\Usercontroller@logout');
Route::get('list','App\Http\Controllers\Goodscontroller@list')->name('list');
Route::post('/goods/search','App\Http\Controllers\Goodscontroller@search');
Route::post('goodsadd/{userId}','App\Http\Controllers\Goodscontroller@add');
Route::get('/goodsdel/{userId}','App\Http\Controllers\Goodscontroller@delate');
Route::get('goodsalt/{goodsId}','App\Http\Controllers\Goodscontroller@altershow');
Route::post('/goodsalter/{userId}','App\Http\Controllers\Goodscontroller@alter');
Route::any('/back','\App\Http\Controllers\Goodscontroller@back');
