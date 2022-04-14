@extends('admin.layout')

@section('pageTitle', 'Nouveau article')

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/admin/article.css') }}">
@endsection
@section('content')

    <h3>Nouveau article</h3>

    <form action="">

        <div class="form-control">
            <label for="title">Titre de l'article</label><br>
            <input type="text" placeholder="Titre" name="title">
        </div>

        <div class="form-control">
            <label for="slug">Slug de votre article</label><br>
            <input type="text" placeholder="Slug" name="slug">
        </div>

        <div class="form-control">
            <label for="illustration">Image illustrant votre article</label><br>
            <input type="file">
        </div>

        <div class="form-control">
            <label for="category">Catégorie de l'article</label><br>
            <select name="category">
                <option value="Informatique">Informatique</option>
                <option value="Electronique">Electronique</option>
                <option value="Physique théorique">Physique théorique</option>
            </select>
        </div>

        <div class="form-control">
            <label for="article">Contenu de l'article</label><br>
            <textarea name="article" placeholder="Mon nouveau article" cols="30" rows="10"></textarea>
        </div>

        <div class="form-action">
            <input type="submit" value="Enregistrer">
        </div>
    </form>

@endsection
