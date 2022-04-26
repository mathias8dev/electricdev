<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class AdminArticleController extends Controller
{


    function articlesList($category)
    {
        $articles = [];
        $selected = $category;
        if ($category === "all") {
            $articles = Article::all();
            $selected = 0;
        } else {
            try {
                $id = +$category;
            } catch (Exception $exception) {
                $id = 0;
            }
            $_category = Category::findOrFail($id);
            $articles = $_category->articles;
        }
        return view('admin.articles', ["articles" => $articles, "categories" => Category::all(), "selected" => $selected]);
    }

    function articlesActionFilter(Request $request)
    {
        $request->validate([
            'category_id' => 'required'
        ]);

        // $articles = null;
        // if ($request->category_id === "all") {
        //     $articles = Article::all();
        // } else {
        //     $articles = Category::findOrFail(+ ($request->category_id))->articles;
        // }
        return redirect(route('admin.articles.list', ["category" => $request->category_id]));
    }

    function articleNew()
    {
        $article = new Article;
        if (count(Category::all()) === 0) {
            return view('admin.create-category-first');
        }

        $article->category = Category::all()->get(0);
        return view('admin.new-article', ["article" => $article, "categories" => Category::all(), "edit" => false]);
    }

    function articleActionRemove(Article $article)
    {
        Storage::disk('public')->delete($article->illustration_image);
        $article->delete();
        return back()->with(['message' => "Article removed successfully"]);;
    }

    function articleActionPublish(Article $article)
    {
        $article->published = true;
        $article->save();
        $articles = Article::all();
        return back()->with(['message' => "Article published."]);
    }

    function articleActionUnPublish(Article $article)
    {
        $article->published = false;
        $article->save();
        $articles = Article::all();
        return back()->with(['message' => "Article unpublished"]);;
    }

    function articleActionEdit(Article $article)
    {
        return view('admin.new-article', ["article" => $article, "categories" => Category::all(), "edit" => true]);
    }


    function articleActionSave(Request $request)
    {
        # Get the article from the request
        # I think the id of the article is automatically set on save of the article
        # Since so, this controller can be used for save purpose like edition ones    }

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'category_id' => ['required'],
            'action' => ['required', 'string', 'max:5'],
            'illustration_image' => ['required', 'file', 'image'],
        ]);

        $article = new Article;
        if ($request->action == "edit") {
            $article = Article::findOrFail($request->article_id);
        }

        # Getting the selected category of the user
        $category = Category::findOrFail(+ ($request->category_id));
        # Storing the illustration image
        $illustrationImage = $request->illustration_image->store('images/articles', 'public');

        # Saving data into the article object
        $article->title = $request->title;

        $article->slug = Str::slug($request->title, '-');
        $article->content = $request->content;

        // if($request->action == "edit") {
        //     if ($request->hasFile('illustration_image')) {

        //     }
        // }
        $article->illustration_image = $illustrationImage;
        $article->illustration_download_url = env('APP_URL') . '/storage/' . $illustrationImage;
        $article->category_id = $category->id;

        $article->save();

        $request->flash();

        return back()->with(
            "saved",
            true
        );
    }
}
