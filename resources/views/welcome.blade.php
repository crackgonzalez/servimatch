@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
    <h1>Bienvenido a ServiMatch</h1>
    <p>Encuentra y ofrece servicios a domicilio fácilmente.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Regístrate</a>
    <a class="btn btn-secondary btn-lg" href="{{ route('login') }}" role="button">Inicia Sesión</a>
</div>
@endsection
