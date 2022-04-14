@extends('blog.layout')

@section('pageTitle', '{{ pageTitle }}')

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/blog/article.show.css') }}">
@endsection

@section('content')
    <article>
        <!-- Display the illustration image -->
        <div class="illustration-image">
            <img src="{{ asset('storage/images/articles/' . $article->illustraton_image) }}" alt="Illustration">
        </div>
        <!-- Display the title of the article -->
        <h1 class="title">{{ $article->title }}</h1>
        <!-- Display the content of the article -->
        <div class="content">{{ $article->content }}</div>
    </article>
@endsection
