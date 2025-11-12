@extends('layout')

@section('titulo', 'Editar Turno')

@section('contenido')
    <h1>Editar turno</h1>

    <form action="{{ route('turnos.update', $turno->id_turno) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $turno->nombre) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Hora de inicio</label>
            <input type="time" name="hora_inicio" class="form-control" value="{{ old('hora_inicio', $turno->hora_inicio) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Hora de fin</label>
            <input type="time" name="hora_fin" class="form-control" value="{{ old('hora_fin', $turno->hora_fin) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Duración (horas)</label>
            <input type="number" name="duracion_horas" class="form-control" value="{{ old('duracion_horas', $turno->duracion_horas) }}">
        </div>

        <button class="btn btn-dark">Actualizar</button>
        <a href="{{ route('turnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection

