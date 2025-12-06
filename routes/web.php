<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application.
| These routes load the login, registration, and protected page.
*/

Route::get('/', [UserController::class, 'showLogin']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'showRegister']);
Route::post('/register', [UserController::class, 'register']);

Route::get('/page1', [UserController::class, 'page1']);
Route::post('/logout', [UserController::class, 'logout']);
