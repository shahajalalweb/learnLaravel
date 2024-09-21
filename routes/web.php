<?php

use App\Http\Controllers\CheckingTest;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Practice By Badsha in learning laravel  
Route::get('/', function () {
    return view('showPost');
})->name('home');

Route::get('/create_post', function () {
    return view('createPost');
})->name('create');



