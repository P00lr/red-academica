@extends('adminlte::page')

@section('title', 'Crear Examen')

@section('content_header')
    <h1>Crear Examen</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('examens.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Archivo</label>
                    <input type="file" class="form-control-file" id="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
@stop
