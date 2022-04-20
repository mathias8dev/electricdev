<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    

    function articlesList() {
        return view('admin.articles');
    }

    function articlesPostAction() {
        return view('admin.articles');
    }

    function articleNew() {
        return view('admin.new-category');
    }
}
