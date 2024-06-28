@extends('adminlte::page')

@section('title', 'Editar Examen')

@section('content_header')
    <h1>Editar Examen</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('examens.update', $examen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $examen->title }}" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $examen->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="file">Archivo</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                    <small class="form-text text-muted">Deja este campo vacío si no deseas actualizar el archivo.</small>
                </div>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
@stop
