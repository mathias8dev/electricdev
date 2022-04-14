@extends('blog.layout')

@section('pageTitle', 'À propos de moi')
@section('headers')
    <link rel="stylesheet" href="{{ asset('css/blog/about.css') }}">
@endsection

@section('content')

    <div><img src="{{ asset('img/circuit.jpg') }}" alt=""></div>
    <p>Je m'appelle kalipe kossi mathias; je suis génie électrique de
        formation mais je
        suis
        passionné d'informatique et
        de physique théorique. Sur ce blog, je raconte ma vie 😆. Je plaisante. <br>Sur ce blog, je parle de tout ce
        qui
        est informatique(programmation, théorie, architecture, actualités), électronique(circuits, réalisations de
        circuits imprimés, théories) et de physique théorique. J'espère que vous prendrez plaisir à me lire.</p>

@endsection
