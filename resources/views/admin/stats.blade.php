@extends('admin.layout')
@section('pageTitle', 'Liste des statistiques')

@section('headers')
<link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection

@section('content')
<h3>Quelques statistiques</h3>
<canvas class="chart1"></canvas>
<canvas class="chart2"></canvas>
<canvas class="chart3"></canvas>
<canvas class="chart4"></canvas>

<script src="{{ asset('js/admin/home.js') }}"></script>
@endsection