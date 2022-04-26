@extends('admin.layout')

@section('pageTitle', 'Erreur, données non disponible')

@section('content')
<h3>Aucune catégorie non créée; veuillez en créez une d'abord</h3>
<div><a href="{{route('admin.categories.new')}}">Créer une catégorie</a></div>
@endsection