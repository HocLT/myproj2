<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [DashboardController::class, 'home'])->name('admin');

Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::post('/login', [DashboardController::class, 'processLogin'])
                    ->name('processLogin');


Route::resource('/product', ProductController::class);