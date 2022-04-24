@extends('admin.layout')
@section('pageTitle', 'Liste des catégories')

@section('headers')

<link rel="stylesheet" href="{{ asset('css/admin/category.list.css') }}">

@endsection
@section('content')

<table>
    <thead>
        <tr>
            <th colspan="10">Categories List</th>
        </tr>
    </thead>
    <tbody>
        <tr class="header">
            <th>Id</th>
            <th>Titre</th>
            <th>Pub_Date</th>
            <th>Articles_Count</th>
            <th>Actions</th>
        </tr>

        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->created_at}}</td>
            <td>{{$category->articles->count()}}</td>
            <td>
                <ul>
                    <li><a href="{{ route('admin.categories.action.edit', ['category' => $category->id ]) }}"><i class="fa-solid fa-pencil"></i></a></li>
                    <li><a href="{{ route('admin.categories.action.remove', ['category' => $category->id ]) }}"><i class="fa-solid fa-trash"></i></a></li>
                    @if ($category->published === true)
                    <li><a href="{{ route('admin.categories.action.un_publish', ['category' => $category->id ]) }}"><i class="fa-solid fa-floppy-disk"></i></a></li>
                    @else
                    <li><a href="{{ route('admin.categories.action.publish', ['category' => $category->id ]) }}"><i class="fa-solid fa-floppy-disk"></i></a></li>
                    @endif
                </ul>
            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@if($message ?? '')
<div class="snackbar">
    {{$message ?? ''}}
</div>

<script src="{{ asset('js/utilities.js') }}"></script>
@endif

@endsection