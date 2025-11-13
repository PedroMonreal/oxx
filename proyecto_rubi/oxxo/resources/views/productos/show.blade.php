@extends('layout')

@section('title', 'Detalles del Producto')

@section('content')
    <h1 class="mb-4">Detalles del Producto</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> {{ $producto->id }}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $producto->nombre }}</li>
        <li class="list-group-item"><strong>Marca:</strong> {{ $producto->marca }}</li>
        <li class="list-group-item"><strong>Precio:</strong> ${{ $producto->precio }}</li>
        <li class="list-group-item"><strong>Categoría:</strong> {{ $producto->categoria }}</li>
    </ul>

    <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
