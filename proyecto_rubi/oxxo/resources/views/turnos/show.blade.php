@extends('layout')

@section('titulo', 'Ver Turno')

@section('contenido')
    <h1>Detalles del Turno</h1>

    <div class="card">
        <div class="card-body">
            <h3>{{ $turno->nombre }}</h3>
            <p><strong>Horario:</strong> {{ $turno->horario }}</p>
        </div>
    </div>

    <a href="{{ route('turnos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
