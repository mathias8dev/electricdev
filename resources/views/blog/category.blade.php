@extends('blog.layout')

@section('pageTitle')
    {{ $pageTitle }}
@endsection

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/blog/article.list.css') }}">
@endsection

@section('content')
    @include('blog.include.articles')
@endsection
