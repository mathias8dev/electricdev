<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    function categoriesList() {
        return view('admin.categories');
    }

    function categoriesPostAction() {
        return view('admin.categories');
    }

    function categoryNew() {
        return view('admin.new-category');
    }
}
