@extends('admin.layout')
@section('pageTitle', 'Nouvelle catégorie')

@section('headers')
<link rel="stylesheet" href="{{asset('css/admin/category.css')}}">
@endsection

@section('content')
<form action="{{route('admin.categories.action.save')}}" method="POST" enctype="multipart/form-data">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @csrf
    @if ($edit === true)
    <input type="text" name="action" value="edit" hidden>
    <input type="text" name="category_id" value="{{ old('category_id', $category->id) }}" hidden>
    @else
    <input type="text" name="action" value="new" hidden>
    @endif

    <h3>New Category Form</h3>

    <div class="form-control">
        <label for="name">Name of the category</label><br>
        <input type="text" name="name" placeholder="Electronic">
    </div>

    <div class="form-control">
        <label for="illustration_image">Illustration image</label>
        <div class="file-field input-field">
            <div class="btn">
                <span class="material-icons-outlined">
                    attachment
                </span>
            </div>
            <div class="file-wrapper">
                <input type="text" value="HelloWorld.jpg" readonly class="file-path">
                <input type="file" name="illustration_image" accept="image/*" hidden>
            </div>
        </div>

        <div class="illustration-image"><img src="" alt=""></div>
    </div>

    <div class="form-control">
        <label for="description">Description</label><br>
        <input type="text" name="description" placeholder="Description">
    </div>

    <div class="form-action">
        <input type="submit" value="Enregistrer">
    </div>

</form>

@if (session('saved'))
<div class="snackbar">
    Article saved successully
</div>
<script src="{{ asset('js/utilities.js') }}"></script>
@endif
<script src="{{ asset('js/file-input.js') }}"></script>
@endsection