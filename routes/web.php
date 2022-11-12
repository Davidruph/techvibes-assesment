<?php

use App\Http\Controllers\LibrarianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReaderController;
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
    return view('login');
});

//readers route
Route::get('/reader', [ReaderController::class, 'readers'])->middleware('isLogged');
Route::post('/reader/search', [ReaderController::class, 'search'])->middleware('isLogged');
Route::get('/reader/borrow-book', [ReaderController::class, 'show_check_out_form'])->middleware('isLogged');
Route::post('/reader/borrow-book', [ReaderController::class, 'borrow_a_book'])->middleware('isLogged');
Route::get('/reader/return-book', [ReaderController::class, 'show_check_in_form'])->middleware('isLogged');
Route::post('/reader/return-book', [ReaderController::class, 'return_a_book'])->middleware('isLogged');

//librarian route
Route::get('/librarian', [LibrarianController::class, 'index'])->middleware('isLogged');
Route::get('/librarian/reader-details', [LibrarianController::class, 'show_user_details'])->middleware('isLogged');
Route::get('/librarian/checked-out-books', [LibrarianController::class, 'checked_out_books'])->middleware('isLogged');
Route::get('/librarian/upload-books', [LibrarianController::class, 'upload_books'])->middleware('isLogged');
Route::post('/librarian/upload-books', [LibrarianController::class, 'store'])->middleware('isLogged');
Route::get('/librarian/books/edit/{id}', [LibrarianController::class, 'edit'])->middleware('isLogged');
Route::post('/librarian/books/update/{id}', [LibrarianController::class, 'update'])->middleware('isLogged');
Route::get('/librarian/books/delete/{id}', [LibrarianController::class, 'destroy'])->middleware('isLogged');


//register route
Route::get('/register', [RegisterController::class, 'index'])->middleware('alreadyLogged');
Route::post('/register', [RegisterController::class, 'store']);

//login route
Route::get('/login', [LoginController::class, 'index'])->middleware('alreadyLogged');
Route::post('/login', [LoginController::class, 'login']);

//logout route
Route::get('/logout', [LoginController::class, 'logout']);