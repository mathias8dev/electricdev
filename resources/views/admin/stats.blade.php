@extends('admin.layout')
@section('pageTitle', 'Liste des statistiques')

@section('headers')
<link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection

@section('content')
<h3>Quelques statistiques</h3>
<canvas id="chart1"></canvas>
<canvas id="chart2"></canvas>
<canvas id="chart3"></canvas>
<canvas id="chart4"></canvas>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/admin/home.js') }}"></script>
@endsection