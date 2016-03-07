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

        <form class="" role="form" method="POST" action="{{ route('register') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2>¡Haz parte de Agroseller!</h2>
            <hr class="Logo-hr">

            <input type="text" class="form-control" placeholder="Nombre" name="name" value="{{ old('name') }}">

            <input type="email" class="form-control" placeholder="E-mail" name="email" value="{{ old('email') }}">

            <select name="role_id" id="">
                <option value="0">¿Mi Actividad?</option>
                <option value="3">Proveedor - Comerciante</option>
                <option value="4">Cliente - productor</option>
            </select>
            <input type="number" placeholder="Número de teléfono" name="mobile_phone"
                   value="{{ old('mobile_phone') }}">
            <label class="Login-label" >
                <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
                <span id="passStrength" class="passStrength"></span>
            </label>
            <input type="password" class="form-control" placeholder="Confirmar Contraseña "
                   name="password_confirmation">
            <label for="policy" class="Label-checkout">
                <input type="checkbox" name="policy" id="policy">
                Acepto las politicas de uso del sitio Agrosellers <a href="">VER</a>
            </label>
            <label for="terms" class="Label-checkout">
                <input type="checkbox" name="terms" id="terms">
                Acepto las politicas de privacidad. <a href="">VER</a>
            </label>

            <button type="submit" class="Login-submit"> Registrarse</button>


        </form>
    </main>
@endsection
@section('scripts')
    <script src="{{asset('js/password.js')}}"></script>
@endsection