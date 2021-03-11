<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [PostController::class, 'index'])->name('dashboard');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
