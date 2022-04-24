<?php

use App\Http\Controllers\AdminAuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminArticleController;
use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->domain('admin.localhost')->group(function () {


    Route::get('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
        ->name('admin.logout');

    Route::get('/', [AdminController::class, 'stats'])
        ->name('admin.stats');

    Route::get('/users/', [UserController::class, 'usersList'])
        ->name('admin.users.list');

    Route::post('/users/', [UserController::class, 'usersPostAction'])
        ->name('admin.users.action');

    Route::get('/users/new/', [UserController::class, 'userNew'])
        ->name('admin.users.new');


    Route::get('/articles/category/{category}', [AdminArticleController::class, 'articlesList'])
        ->name('admin.articles.list');

    Route::post('/articles/', [AdminArticleController::class, 'articlesActionFilter'])
        ->name('admin.articles.ation.filter');

    // Route::post('articles/', [AdminArticleController::class, 'articlesPostAction'])
    //     ->name('admin.articles.action');

    Route::get('articles/{article}/edit', [AdminArticleController::class, 'articleActionEdit'])
        ->name('admin.articles.action.edit');


    Route::get('articles/{article}/publish', [AdminArticleController::class, 'articleActionPublish'])
        ->name('admin.articles.action.publish');

    Route::get('articles/{article}/un_publish', [AdminArticleController::class, 'articleActionUnPublish'])
        ->name('admin.articles.action.un_publish');

    Route::get('articles/{article}/remove', [AdminArticleController::class, 'articleActionRemove'])
        ->name('admin.articles.action.remove');


    Route::get('articles/new/', [AdminArticleController::class, 'articleNew'])
        ->name('admin.articles.new');

    Route::post('articles/new/', [AdminArticleController::class, 'articleActionSave'])
        ->name('admin.articles.action.save');



    Route::get('/categories/', [AdminCategoryController::class, 'categoriesList'])
        ->name('admin.categories.list');

    Route::post('categories/', [AdminCategoryController::class, 'categoriesPostAction'])
        ->name('admin.categories.action');

    Route::get('categories/{category}/edit', [AdminCategoryController::class, 'categoryActionEdit'])
        ->name('admin.categories.action.edit');


    Route::get('categories/{category}/publish', [AdminCategoryController::class, 'categoryActionPublish'])
        ->name('admin.categories.action.publish');

    Route::get('categories/{category}/un_publish', [AdminCategoryController::class, 'categoryActionUnPublish'])
        ->name('admin.categories.action.un_publish');

    Route::get('categories/{category}/remove', [AdminCategoryController::class, 'categoryActionRemove'])
        ->name('admin.categories.action.remove');


    Route::get('categories/new/', [AdminCategoryController::class, 'categoryNew'])
        ->name('admin.categories.new');

    Route::post('categories/new/', [AdminCategoryController::class, 'categoryActionSave'])
        ->name('admin.categories.action.save');
});
