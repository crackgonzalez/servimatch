@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a tu panel de proveedor</h1>
    <p>Aquí puedes gestionar tus servicios.</p>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Crear Nuevo Servicio</a>
    <!-- Listado de servicios -->
    <div class="row">
        @foreach($servicios as $servicio)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $servicio->nombre }}</h5>
                        <p class="card-text">{{ $servicio->descripcion }}</p>
                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-secondary">Editar</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
