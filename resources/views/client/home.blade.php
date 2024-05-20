@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bienvenido a tu panel de cliente</h1>
    <p>Aquí puedes buscar y reservar servicios.</p>
    <!-- Listado de servicios -->
    <div class="row">
        @foreach($servicios as $servicio)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $servicio->nombre }}</h5>
                        <p class="card-text">{{ $servicio->descripcion }}</p>
                        <a href="{{ route('servicios.show', $servicio->id) }}" class="btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
