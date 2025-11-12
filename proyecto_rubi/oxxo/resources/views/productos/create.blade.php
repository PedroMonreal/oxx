@extends('layout')

@section('title', 'Agregar Producto')

@section('content')
    <h1 class="mb-4">Agregar Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control">
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precio" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <input type="text" name="categoria" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
