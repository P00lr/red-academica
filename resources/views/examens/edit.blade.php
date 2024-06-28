@extends('adminlte::page')

@section('title', 'Editar Examen')

@section('content_header')
    <h1>Editar Modelo de Examen</h1>
@stop

@section('content')
    @if(session('success')){{-- para el mensaje de registrado con exito --}}
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('examens.update', $examen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $examen->titulo }}" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $examen->descripcion }}</textarea>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.style.display = 'none';
            }, 3000);
        }
    });
</script>