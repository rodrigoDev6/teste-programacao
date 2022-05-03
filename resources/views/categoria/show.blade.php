@extends('adminlte::page')

@section('title', 'Sobra Quanto')

@section('content_header')
    <h1 class="text-center">Artigo Selecionadoe:</h1>
@stop

@section('content')


    <ul class="list-unstyled">
        <li><b>ID:</b> {{ $categorias->id }}</li>
        <li><b>Titulo:</b> {{ $categorias->nome }}</li>
        <li><b>Criado em:</b> {{ $categorias->created_at }}</li>
    </ul>

    <a href="{{ url('artigo') }}" class="btn btn-primary">Voltar</a>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="icon" href="img/sobraquanto.png">

@stop