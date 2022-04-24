<?php

use App\Http\Controllers\AdminAuthenticatedSessionController;
use App\Http\Controllers\AdminRegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::domain('admin.localhost')->group(function () {

    Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthenticatedSessionController::class, 'store']);

    Route::get('/register', [AdminRegistrationController::class, 'create'])
        ->name('admin.register');
    Route::post('/register', [AdminRegistrationController::class, 'register']);
});
