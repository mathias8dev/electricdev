<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class BlogController extends Controller
{
    //

    function home()
    {
        $articles = Article::all()->orderByDesc('created_at')->get();
        return view('blog.home', ['articles' => $articles]);
    }

    function category($categoryName)
    {
        if ($categoryName == "electronic") {
            $articles = Article::where('category_id', 1)->orderByDesc('created_at')->get();
            // Get the list of all articles
            // Return the articles
            return view('blog.category', ['pageTitle' => "Articles de la catégorie électronique", 'articles' => $articles]);
        } else if ($categoryName == "programming") {
            $articles = Article::where('category_id', 3)->orderByDesc('created_at')->get();

            return view('blog.category', ['pageTitle' => "Articles de la catégorie programmation", 'articles' => $articles]);
        }
        $articles = Article::where('category_id', 2)->orderByDesc('created_at')->get();

        return view('blog.category', ['pageTitle' => "Articles de la catégorie informatique", 'articles' => $articles]);
    }
}
