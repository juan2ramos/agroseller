@extends('layout')

@section('content')
    <main class="Login">
        @if (count($errors) > 0)
            <div class="">
                Por favor corrige los siguientes errores:<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <figure class="Login-logo">
            <img src="images/agroseller-logo.png" alt="">
        </figure>
        <hr class="Logo-hr">
        <form class="" role="form" method="POST" action="/auth/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="email" placeholder="E-mail" name="email">

            <input type="password" name="password" placeholder="Contraseña">

            <a class="login-restartPassword" href="/password/email">Olvido su contraseña?</a>

            <button type="submit" class="Login-submit">INICIO DE SESIÓN</button>

        </form>
    </main>
@endsection