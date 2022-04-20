<?php

use App\Http\Controllers\AdminAuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->domain('admin.localhost')->group(function () {


    Route::get('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');

    Route::get('/', [AdminController::class, 'home'])
        ->name('admin.home');

    Route::get('/users/', [UserController::class, 'usersList'])
        ->name('admin.users.list');

    Route::post('/users/', [UserController::class, 'usersPostAction'])
        ->name('admin.users.action');

    Route::get('/users/new/', [UserController::class, 'userNew'])
        ->name('admin.users.new');


    Route::get('/articles/', [ArticleController::class, 'articlesList'])
        ->name('admin.articles.list');

    Route::get('articles/', [ArticleController::class, 'articlesPostAction'])
        ->name('admin.articles.action');

    Route::get('articles/new/', [ArticleController::class, 'articleNew'])
        ->name('admin.articles.new');


    Route::get('/categories/', [CategoryController::class, 'categoriesList'])
        ->name('admin.categories.list');
        
    Route::get('/categories/', [CategoryController::class, 'categoriesPostAction'])
        ->name('admin.categories.action');

    Route::get('categories/new/', [CategoryController::class, 'categoryNew'])
        ->name('admin.categories.new');
});
