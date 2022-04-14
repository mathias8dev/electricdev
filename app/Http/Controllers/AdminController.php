<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    function home()
    {
        return view('admin.home');
    }

    function articles()
    {
        return view('admin.articles');
    }

    function categories()
    {
        return view('admin.categories');
    }

    function newArticle()
    {
        return view('admin.new-article');
    }

    function showArticle()
    {
        return view('admin.article-show');
    }
}
