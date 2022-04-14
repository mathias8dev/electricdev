@extends('admin.layout')

@section('pageTitle', 'Liste des articles')

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/blog/article.list.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/article.list.css') }}">
@endsection

@section('content')

    <h3>Liste des articles</h3>
    <div class="form"></div>
    <div class="form-control">
        <label for="category"></label><br>
        <select name="category">
            <option value="all">Toutes les catégories</option>
            <option value="electronic">Electronique</option>
            <option value="computer_science">Informatique</option>
            <option value="programming">Programmation</option>
        </select>
    </div>
    <div class="form-control"><label for="search"></label><br>
        <input type="text" placeholder="Titre de l'article">
    </div>
    <div class="form-control"><input type="submit" value="Filtrer"></div>
    @include('blog.include.articles')
@endsection
