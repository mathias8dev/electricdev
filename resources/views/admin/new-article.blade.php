@extends('admin.layout')

@section('pageTitle', 'Nouveau article')

@section('headers')
<link rel="stylesheet" href="{{ asset('css/admin/article.css') }}">
<link rel="stylesheet" href="{{ asset('css/file-input.css') }}">
@endsection
@section('content')

    <h3>New Article</h3>

    <form action="{{ route('admin.articles.action.save') }}" method="POST">
        @csrf

        @if ($edit === true)
            <input type="text" name="action" value="edit" hidden>
            <input type="text" name="article_id" value="{{ old('article_id', $article->id) }}" hidden>
        @else
            <input type="text" name="action" value="new" hidden>
        @endif
        <div class="form-control">
            <label for="category">Category</label> <br>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option selected="{{ old('category', $article->category->id) === $category->id }}"
                        value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="title">Title of the article</label><br>
            <input type="text" placeholder="Title" value="{{ old('title', $article->title) }}" name="title">
        </div>


        <div class="form-control">
            <label for="illustration">Illustration of the article</label>
            <div class="file-field input-field">
                <div class="btn">
                    <span class="material-icons-outlined">
                        attachment
                    </span>
                </div>
                <div class="file-wrapper">
                    <input type="text" value="HelloWorld.jpg" readonly class="file-path">
                    <input type="file" value="{{ old('illustration_image', '') }}" name=" illustration_image"
                        accept="image/*" hidden>
                </div>
            </div>

            <div class="illustration-image"><img src="" alt=""></div>
        </div>


        <div class="form-control">
            <label for="article">Content</label><br>
            <input type="text" name="content" hidden value="{{ old('content', $article->content) }}">
            <div id="editorjs"></div>
        </div>

        <div class="form-action">
            <input type="submit" value="Save">
        </div>
    </form>

    @if (session('saved'))
        <div class="snackbar">
            Article saved successully
        </div>
        <script src="{{ asset('js/utilities.js') }}"></script>
    @endif
    <script src="{{ asset('js/file-input.js') }}"></script>
    <script src="{{ asset('js/admin/index2.js') }}"></script>

@endsection
