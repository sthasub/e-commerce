<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Route::view('/login','login');

Route::get('/logout',function (){
   Session::forget('user');
   return redirect('login');
});
Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::post('/add_to_basket',[ProductController::class,'AddToBasket']);
Route::get('/search',[ProductController::class,'search']);
Route::get('/basketList',[ProductController::class,'basketList']);
Route::get('/removebasket/{id}',[ProductController::class,'removebasket']);
Route::get('/ordernow',[ProductController::class,'orderNow']);
Route::post('/orderplace',[ProductController::class,'orderPlace']);
Route::get('/myorders',[ProductController::class,'myorder']);
