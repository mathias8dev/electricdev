<?php

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::middleware('ip.registration')->group(function () {

    Route::get('/', function () {
        // Get all articles
        // Return the list to the view

        $articles = Article::all()->sortByDesc('created_at');
        $categories = Category::all();

        if ($categories->count() === 0) {
            return view('blog.setup-first');
        }

        return view('blog.home', ['articles' => $articles, 'categories' => $categories]);
    })->name('blog.home');

    Route::get('/categorie/{category:slug}', function (Category $category) {
        $articles = $category->articles;
        $pageTitle = "Articles de la catégorie " . Str::lower($category->name);
        $categories = Category::all();

        return view('blog.category',  ['pageTitle' => $pageTitle, 'articles' => $articles, 'categories' => $categories]);
    })->name('blog.category');
    // Route::get('/categorie/electronique', function () {

    //     // Call the eloquent underlying model
    //     $articles = Article::where('category_id', 1)->orderByDesc('created_at')->get();
    //     // Get the list of all articles
    //     // Return the articles
    //     return view('blog.category', ['pageTitle' => "Articles de la catégorie électronique", 'articles' => $articles]);
    // })->name('blog.category.electronic');

    // Route::get('/categorie/informatique', function () {

    //     // Call the eloquent underlying model
    //     // Get the list of all articles
    //     // Return the articles
    //     $articles = Article::where('category_id', 2)->orderByDesc('created_at')->get();

    //     return view('blog.category', ['pageTitle' => "Articles de la catégorie informatique", 'articles' => $articles]);
    // })->name('blog.category.computer_science');

    // Route::get('/categorie/programmation', function () {

    //     // Call the eloquent underlying model
    //     // Get the list of all articles
    //     // Return the articles
    //     $articles = Article::where('category_id', 3)->orderByDesc('created_at')->get();

    //     return view('blog.category', ['pageTitle' => "Articles de la catégorie programmation", 'articles' => $articles]);
    // })->name('blog.category.programming');

    Route::get('/categorie/{category:slug}/{article:slug}', function (Category $category, Article $article) {

        // // Call the eloquent underlying model
        // $category = Category::where('name', ucfirst($_category))->first();

        // if (is_null($category)) {
        //     abort(404);
        // }
        // $article_slug = $_article;

        // $article = Article::where('slug', $article_slug)->where('category_id', $category->id)->first();
        // if (is_null($article)) {
        //     abort(404);
        // }
        // Get the article
        // Return the article
        $categories = Category::all();
        return view('blog.article', ['pageTitle' => "Article | " . $article->title, 'article' => $article, 'categories' => $categories]);
    })->name('blog.article.show');

    Route::get('/apropos', function () {
        return view('blog.about');
    })->name('blog.about');
});
