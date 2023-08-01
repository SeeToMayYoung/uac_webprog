<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RelationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class,'view']);

Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [LoginController::class,'store']);


Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [LoginController::class,'login']);

Route::get('/logout', [LoginController::class,'logout']);

Route::get('/view/{id}', [UserController::class,'display']);
Route::post('/like-person', [RelationController::class,'like']);

Route::get('/profile', [UserController::class,'lists']);


