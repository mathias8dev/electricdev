@extends('admin.layout')

@section('pageTitle', 'Liste des articles')

@section('headers')
<link rel="stylesheet" href="{{ asset('css/blog/article.list.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/article.list.css') }}">
@endsection

@section('content')

<h3>Categories list</h3>
<form action="{{route('admin.articles.ation.filter')}}" method="POST" class="form">
    @csrf
    {{-- <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul> --}}

    <div class="form-control">
        <label for="category"></label><br>
        <select name="category_id">
            <option value="all">All categories</option>
            @foreach ($categories ?? [] as $category)
            @if ($selected == $category->id)

            <option value="{{$category->id}}" selected>{{ $category->name }}</option>

            @else

            <option value="{{$category->id}}">{{ $category->name }}</option>

            @endif
            @endforeach
        </select>
    </div>
    <div class="form-action">
        <input type="submit" value="Filter">
    </div>
</form>

<table>
    <thead>
        <tr>
            <th colspan="10">Article List</th>
        </tr>
    </thead>
    <tbody>
        <tr class="header">
            <th>Id</th>
            <th>Titre</th>
            <th>Pub_Date</th>
            <th>Comments_Count</th>
            <th>Actions</th>
        </tr>

        @foreach ($articles as $article)
        <tr>
            <td>{{$article->id}}</td>
            <td>{{$article->title}}</td>
            <td>{{$article->created_at}}</td>
            <td>{{$article->comments->count()}}</td>
            <td>
                <ul>
                    <li><a href="{{ route('admin.articles.action.edit', ['article' => $article->id]) }}"><i class="fa-solid fa-pencil"></i></a></li>
                    <li><a href="{{ route('admin.articles.action.remove', ['article' => $article->id]) }}"><i class="fa-solid fa-trash"></i></a></li>
                    @if ($article->published === true)
                    <li><a href="{{ route('admin.articles.action.un_publish', ['article' => $article->id]) }}"><i class="fa-solid fa-floppy-disk"></i></a></li>
                    @else
                    <li><a href="{{ route('admin.articles.action.publish', ['article' => $article->id]) }}"><i class="fa-solid fa-floppy-disk"></i></a></li>
                    @endif
                </ul>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@if ($message ?? '')
<div class="snackbar">
    {{ $message ?? '' }}
</div>

<script src="{{ asset('js/utilities.js') }}"></script>
@endif
@endsection