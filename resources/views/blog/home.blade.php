@extends('blog.layout')

@section('pageTitle', "Page d'accueil")
@section('headers')
    <link rel="stylesheet" href="{{ asset('css/blog/article.list.css') }}">
@endsection
@section('content')
    @include('blog.include.articles')
@endsection
