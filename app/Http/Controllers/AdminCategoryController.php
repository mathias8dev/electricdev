<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class AdminCategoryController extends Controller
{


    function categoriesList()
    {
        return view('admin.categories', ["categories" => Category::all()]);
    }


    function categoryNew()
    {
        $category = new Category;
        return view('admin.new-category', ["edit" => false]);
    }

    function categoryActionRemove(Category $category)
    {
        $category->delete();
        return redirect(route('admin.categories.list', ['categories' => category::all(), 'message' => "category removed successfully"]));
    }

    function categoryActionPublish(Category $category)
    {
        $category->published = true;
        $category->save();
        $categories = Category::all();
        return redirect(route('admin.categories.list', ['categories' => $categories, 'message' => "category published"]));
    }

    function categoryActionUnPublish(Category $category)
    {
        $category->published = false;
        $category->save();
        $categories = Category::all();
        return redirect(route('admin.categories.list', ['categories' => $categories, 'message' => "category set to unpublished"]));
    }

    function categoryActionEdit(Category $category)
    {
        return redirect(route('admin.categories.new', ["category" => $category, "edit" => true]));
    }


    function categoryActionSave(Request $request)
    {
        # Get the category from the request
        # I think the id of the category is automatically set on save of the category
        # Since so, this controller can be used for save purpose like edition ones    }

        $request->validate([
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'illustration_image' => ['required', 'file', 'image'],
        ]);

        $category = new Category;
        
        if ($request->action == "edit") {
            $category = Category::findOrFail($request->category_id);
        }

        


        # Storing the illustration image
        $illustrationImage = $request->illustration_image->store('images');

        # Saving data into the category object
        $category->name = $request->name;
        $category->description = $request->description;
        $category->illustration_image = $illustrationImage;

        $category->save();

        $request->flash();

        return back()->with(
            "saved",
            true
        );
    }
}
