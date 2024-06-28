@extends('adminlte::page')

@section('title', 'Detalles del Examen')

@section('content_header')
    <h1>Detalles del Examen</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Título: {{ $examen->title }}</h5>
            <p class="card-text">Descripción: {{ $examen->description }}</p>

            <hr>

            <div class="text-center">
                @if(Str::contains($examen->file_path, ['.jpeg', '.jpg', '.png']))
                    <img src="{{ Storage::url($examen->file_path) }}" alt="Archivo" style="max-width: 100%; height: auto;">
                @else
                    <a href="{{ Storage::url($examen->file_path) }}" target="_blank">Ver Archivo</a>
                @endif
            </div>
        </div>
    </div>
@stop
