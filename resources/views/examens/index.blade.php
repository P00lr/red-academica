@extends('adminlte::page')

@section('title', 'Lista de Exámenes')

@section('content_header')
    <div class="text-center">
        <h1>Lista de Modelos de Exámenes</h1>
    </div>
@stop

@section('content')
    @if(session('success')){{-- para el mensaje de registrado con exito --}}
        <div class="alert alert-success" id="success-alert">
             {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('examens.create') }}" class="btn btn-primary">Subir Nuevo Modelo</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($examens as $examen)
                    <tr>
                        <td>{{ $examen->titulo }}</td>
                        <td>{{ $examen->descripcion }}</td>
                        <td>
                            @if(Str::contains($examen->file_path, ['.jpeg', '.jpg', '.png']))
                                <a href="{{ asset('storage/' . $examen->file_path) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $examen->file_path) }}" alt="Archivo" width="100">
                                </a>
                            @else
                                <a href="{{ asset('storage/' . $examen->file_path) }}" target="_blank">Ver Archivo</a>
                            @endif
                        </td>
                                            
                        <td>
                            <a href="{{ route('examens.show', $examen->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('examens.edit', $examen->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('examens.destroy', $examen->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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