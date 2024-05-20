@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nuevo Servicio</h1>
    <form method="POST" action="{{ route('servicios.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Servicio</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Servicio</button>
    </form>
</div>
@endsection
