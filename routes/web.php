<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return redirect('/books');
});

Route::get('books', [BookController::class, 'index']);

Route::post('books', [BookController::class, 'store']);

Route::get('books/{id}/edit', [BookController::class, 'edit']);

Route::put('books/{id}', [BookController::class, 'update']);

Route::delete('books/{id}', [BookController::class, 'destroy']);

