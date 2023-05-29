<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FE\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/login', [DashboardController::class, 'login'])->name('login');

Route::post('/login', [DashboardController::class, 'processLogin'])
                    ->name('processLogin');

Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

Route::group(['middleware'=>'islogin'], function() {

    Route::get('/admin', [DashboardController::class, 'home'])->name('admin');

    Route::group(['middleware'=>'isadmin', 'prefix'=>'admin', 'as'=>'admin.'], function() {

        Route::resource('/product', ProductController::class);

    });
});


