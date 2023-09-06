@extends('my-layouts.my-app')
@section('title', 'Mi Página')
@section('content')
    
    <p>{{$texto}}</p>
    <p>Numero de visitas: {{$count}}</p>
    <p>Contador cache: {{$contadorCache}}</p>
@endsection