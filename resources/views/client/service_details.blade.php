@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $servicio->nombre }}</h1>
    <p>{{ $servicio->descripcion }}</p>
    <p><strong>Precio:</strong> ${{ $servicio->precio }}</p>
    <a href="{{ route('reservas.create', $servicio->id) }}" class="btn btn-primary">Reservar</a>
</div>
@endsection
