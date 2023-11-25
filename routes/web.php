<?php

use App\Http\Controllers\bookController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/', [bookController::class, 'index'])->name('index');
Route::get('/addBook', [bookController::class, 'addBook'])->name('addBook');
Route::post('/storeBook', [bookController::class, 'storeBook'])->name('storeBook');
Route::get('/bookDetails/{id}', [bookController::class, 'bookDetail'])->name('bookDetail');
Route::get('/editBook/{id}', [bookController::class, 'editBook'])->name('editBook');
Route::post('/updateBook/{id}', [bookController::class, 'updateBook'])->name('updateBook');
Route::delete('deleteBook/{id}', [bookController::class, 'deleteBook'])->name('deleteBook');
