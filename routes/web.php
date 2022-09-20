<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Site;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

Route::get('/', [Site\HomeController::class, 'index']);

Route::prefix('painel')->group(function () {
    Route::get('/', [Admin\HomeController::class, 'index'])->name('admin');

    Route::get('login', [Admin\Auth\LoginController::class, 'index'])->name('login');
    Route::post('login', [Admin\Auth\LoginController::class, 'authenticate']);

    Route::get('register', [Admin\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('register', [Admin\Auth\RegisterController::class, 'register']);

    Route::post('logout', [Admin\Auth\LoginController::class, 'logout'])->name('logout');
});
