<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/v1/welcome', [BookController::class, 'index'])->name('book.index');
Route::get('/v1/createBook', [BookController::class, 'displayCreatePage'])->name('book.renderCreate');
Route::post('/v1/createBookDetail', [BookController::class, 'createBook'])->name('book.create');
Route::get('/v1/getBooks', [BookController::class, 'listBooks'])->name('book.renderBooks');
Route::get('/v1/updateBooks/{book}', [BookController::class, 'renderUpdateBookPage'])->name('book.renderUpdatePage');
Route::put('/v1/updateBookDetails/{book}', [BookController::class, 'updateBook'])->name('book.update');
Route::delete('/v1/deleteBook/{book}', [BookController::class, 'deleteBook'])->name('book.delete');