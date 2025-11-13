@extends('layout')

@section('titulo', 'Crear Turno')

@section('contenido')
    <div class="card shadow p-4">
        <h1 class="mb-4 text-center">Crear nuevo turno</h1>

        <form action="{{ route('turnos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del turno</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hora_inicio" class="form-label">Hora de inicio</label>
                <input type="time" name="hora_inicio" class="form-control" value="{{ old('hora_inicio') }}" required>
                @error('hora_inicio')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hora_fin" class="form-label">Hora de fin</label>
                <input type="time" name="hora_fin" class="form-control" value="{{ old('hora_fin') }}" required>
                @error('hora_fin')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="duracion_horas" class="form-label">Duración (horas)</label>
                <input type="number" name="duracion_horas" class="form-control" value="{{ old('duracion_horas') }}" required>
                @error('duracion_horas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button class="btn btn-dark">Guardar</button>
                <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
