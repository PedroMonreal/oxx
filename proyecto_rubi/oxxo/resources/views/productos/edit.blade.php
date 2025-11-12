@extends('layout')

@section('title', 'Editar Producto')

@section('content')
    <h1 class="mb-4">Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>

        <div class="mb-3">
            <label>Marca</label>
            <input type="text" name="marca" class="form-control" value="{{ $producto->marca }}">
        </div>

        <div class="mb-3">
            <label>Precio</label>
            <input type="number" name="precio" step="0.01" class="form-control" value="{{ $producto->precio }}" required>
        </div>

        <div class="mb-3">
            <label>Categoría</label>
            <input type="text" name="categoria" class="form-control" value="{{ $producto->categoria }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection
