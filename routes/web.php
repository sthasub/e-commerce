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

Route::post('/logout',[UserController::class,'logout']);
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::post('/add_to_basket',[ProductController::class,'AddToBasket']);
Route::get('/search',[ProductController::class,'search']);
Route::get('/basketList',[ProductController::class,'basketList']);
Route::get('/removebasket/{bid}',[ProductController::class,'removebasket']);
Route::get('/ordernow',[ProductController::class,'orderNow']);
Route::post('/orderplace',[ProductController::class,'orderPlace']);
Route::get('/loginGithub',[UserController::class,'loginGithub']);
Route::get('/myorders',[ProductController::class,'myorder']);
Route::view('/register',"registration");

// Google login
Route::get('/google/redirect', [UserController::class,'googleRedirect']);
Route::get('/google/callback', [UserController::class,'googleCallback']);

//facebook login
Route::get('/facebook/redirect',[UserController::class,'facebookRedirect']);
Route::get('/auth/facebook/callback',[UserController::class,'facebookCallback']);
