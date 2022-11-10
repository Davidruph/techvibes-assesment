<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

//homepage route
Route::get('/', function () {
    return view('index');
});

//readers route
Route::get('/reader', [LoginController::class, 'readers'])->middleware('isLogged');

//librarian route
Route::get('/librarian', [LoginController::class, 'librarian'])->middleware('isLogged');

//register route
Route::get('/register', [RegisterController::class, 'index'])->middleware('alreadyLogged');
Route::post('/register', [RegisterController::class, 'store']);

//login route
Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLogged');
Route::post('/login', [LoginController::class, 'login']);

//logout route
Route::get('/logout', [LoginController::class, 'logout']);