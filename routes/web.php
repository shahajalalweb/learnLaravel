<?php

use App\Http\Controllers\CheckingTest;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Practice By Badsha in learning laravel  
/* Route::get('/', function () {
    return view('showPost');
})->name('home');

Route::get('/create_post', function () {
    return view('createPost');
})->name('create'); */

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/create', [PostController::class, 'create'])->name('create');

Route::post('/store/post', [PostController::class, 'store'])->name('store');

Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('destroy');



