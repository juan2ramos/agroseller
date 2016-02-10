@extends('layout')

@section('content')
    <a href="/">
        <figure class="Login-logo">
            <a href="/"><img src="{{ url('images/agroseller-logo.png') }}" alt=""> </a>
        </figure>
    </a>
    <a href="{{route('login')}}">
        <button class="Header-login">Inicia Sesión</button>
    </a>
    <main class="Login">
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2>¡Únete a Agroseller!</h2>
            <hr class="Logo-hr">

            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}">

            <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}">

            <select name="role_id" id="">
                <option value="0">¿Mi Actividad?</option>
                <option value="3">Proveedor - Comerciante</option>
                <option value="4">Cliente - productor</option>
            </select>
            <input type="number" placeholder="Número de teléfono" name="mobile_phone" value="{{ old('mobile_phone') }}">
            <input type="password" class="form-control" placeholder="Contraseña" name="password">
            <input type="password" class="form-control" placeholder="Confirmar Contraseña "
                   name="password_confirmation">
            <button type="submit" class="Login-submit"> Registrarse</button>


        </form>
    </main>
@endsection
