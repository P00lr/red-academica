@extends('adminlte::page')

@section('title', 'Lista de Exámenes')

@section('content_header')
    <h1>Lista de Exámenes</h1>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{ route('examens.create') }}" class="btn btn-primary">Crear Examen</a>
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
                        <td>{{ $examen->title }}</td>
                        <td>{{ $examen->description }}</td>
                        <td>
                            @if(Str::contains($examen->file_path, ['.jpeg', '.jpg', '.png']))
                                <a href="{{ Storage::url($examen->file_path) }}" target="_blank">
                                    <img src="{{ Storage::url($examen->file_path) }}" alt="Archivo" width="100">
                                </a>
                            @else
                                <a href="{{ Storage::url($examen->file_path) }}" target="_blank">Ver Archivo</a>
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
