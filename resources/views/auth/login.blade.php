@extends('layout')

@section('content')
    <main class="Login">
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages();  ?>
        @endif
        <figure class="Login-logo">
            <img src="{{ url('images/agroseller-logo.png') }}" alt="">
        </figure>
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