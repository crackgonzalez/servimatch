@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservar {{ $servicio->nombre }}</h1>
    <form method="POST" action="{{ route('reservas.store') }}">
        @csrf
        <input type="hidden" name="servicio_id" value="{{ $servicio->id }}">
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" required>
        </div>
        <button type="submit" class="btn btn-primary">Reservar</button>
    </form>
</div>
@endsection
