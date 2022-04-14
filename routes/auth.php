<?php

use App\Http\Controllers\AdminAuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::domain('admin.localhost')->group(function () {

    Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->domain('admin.localhost')->group(function () {


    Route::get('/register', [AdminRegistrationController::class, 'create'])
        ->name('admin.register');
    Route::post('/register', [AdminRegistrationController::class, 'register']);


    Route::get('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');

    Route::get('/', [AdminController::class, 'home'])
        ->name('admin.home');

    Route::get('/articles', [AdminController::class, 'articles'])
        ->name('admin.articles');
});
