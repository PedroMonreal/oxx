@extends('layout')

@section('titulo', 'Listado de Turnos')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Turnos</h1>
        <a href="{{ route('turnos.create') }}" class="btn btn-dark">+ Crear Turno</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-danger">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($turnos as $turno)
            <tr>
                <td>{{ $turno->id }}</td>
                <td>{{ $turno->nombre }}</td>
                <td>{{ $turno->horario }}</td>
                <td>
                    <a href="{{ route('turnos.show', $turno) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('turnos.edit', $turno) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('turnos.destroy', $turno) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este turno?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center">No hay turnos registrados.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
