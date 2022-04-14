@extends('admin.layout')

@section('pageTitle', 'Dashboard')

@section('headers')
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
@endsection
@section('content')

    <canvas id="chart1" width="400" height="300"></canvas>
    <canvas id="chart2" width="400" height="300"></canvas>
    <canvas id="chart3" width="400" height="300"></canvas>
    <canvas id="chart4" width="400" height="300"></canvas>

    <h3>En vrai, ce n'est pas encore implémenté</h3>

@endsection
