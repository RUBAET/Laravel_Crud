<?php

use App\Http\Controllers\ProductController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/',[ProductController::class,'index']);
Route::get('/add',[ProductController::class,'create']);
Route::post('/store',[ProductController::class,'store']);
Route::get('/edit/{id}',[ProductController::class,'edit']);
Route::post('/edit/{id}',[ProductController::class,'update']);
Route::get('/delete/{id}',[ProductController::class,'destroy']);