<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class AdminCategoryController extends Controller
{


    function categoriesList()
    {
        $categories = Category::all();
        if (count($categories) === 0)
            return view('admin.create-category-first');
        return view('admin.categories', ["categories" => $categories]);
    }


    function categoryNew()
    {
        $category = new Category;
        return view('admin.new-category', ["category" => $category, "edit" => false]);
    }

    function categoryActionRemove(Category $category)
    {
        Storage::disk('public')->delete($category->illustration_image);
        $category->delete();
        return back()->with(['message' => "category removed successfully"]);
    }

    function categoryActionPublish(Category $category)
    {
        $category->published = !$category->published;
        $message = $category->published === true ? "Category published." : "Category unpublished";
        $category->save();
        $categories = Category::all();
        return back()->with(['message' => $message]);
    }

    function categoryActionUnPublish(Category $category)
    {
        $category->published = false;
        $category->save();
        return back()->with(['message' => "category set to unpublished"]);
    }

    function categoryActionEdit(Category $category)
    {

        return view('admin.new-category', ["category" => $category, "edit" => true]);
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
        $illustrationImage = $request->illustration_image->store('images/categories', 'public');

        # Saving data into the category object
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->illustration_image = $illustrationImage;
        $category->illustration_download_url = env("APP_URL") . '/storage/' . $illustrationImage;
        $category->save();

        $request->flash();

        return back()->with(
            "saved",
            true
        );
    }
}
