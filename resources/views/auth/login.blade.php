@extends('layout')

@section('content')
    <figure class="Login-logo">
        <a href="/"><img src="{{ url('images/agroseller-logo.png') }}" alt=""></a>
    </figure>
    <a href="{{route('register')}}">
        <button class="Header-login">Registrate</button>
    </a>
    <main class="Login">
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages();  ?>
        @endif
        <h2>Inicio de sesión</h2>
        <hr class="Logo-hr">
        <form class="" role="form" method="POST" action="{{ route('login') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @if (!empty($errorArray["email"])) <span class="Login-error">{{ $errorArray["email"][0] }} </span>@endif
            <input type="email" placeholder="E-mail" name="email" value="{{ old('email') }}">

            @if (!empty($errorArray["password"])) <span  class="Login-error">{{ $errorArray["password"][0] }} </span>@endif
            <input type="password" name="password" placeholder="Contraseña">

            <a class="login-restartPassword" href="/password/email">Olvido su contraseña?</a>

            <button type="submit" class="Login-submit">INICIO DE SESIÓN</button>

        </form>
    </main>
@endsection