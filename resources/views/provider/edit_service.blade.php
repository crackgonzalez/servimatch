@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Servicio</h1>
    <form method="POST" action="{{ route('servicios.update', $servicio->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nombre">Nombre del Servicio</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $servicio->nombre) }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion', $servicio->descripcion) }}</textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" value="{{ old('precio', $servicio->precio) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Servicio</button>
    </form>
</div>
@endsection
