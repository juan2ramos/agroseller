@extends('layout')

@section('content')
    <main class="Login">
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <figure class="Login-logo">
                <img src="{{ url('images/agroseller-logo.png') }}" alt="">
            </figure>
            <hr class="Logo-hr">

            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}">

            <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}">

            <select name="role_id" id="">
                <option value="0">¿Que tipo  de cliente eres?</option>
                <option value="3">Cliente</option>
                <option value="4">Proveedor</option>
            </select>

            <input type="password" class="form-control" placeholder="Contraseña" name="password">

            <input type="password" class="form-control" placeholder="Confirmar Contraseña " name="password_confirmation">

            <button type="submit" class="Login-submit"> Registrarse </button>


        </form>
    </main>
@endsection
