@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Artigo Selecionadoe:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $artigos->id }}</li>
        <li><b>Titulo:</b> {{ $artigos->titulo }}</li>
        <li><b>Texto:</b> {{ $artigos->texto }}</li>
        <li><b>Criado em:</b> {{ $artigos->created_at }}</li>
    </ul>

    <a href="{{ url('artigo') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop