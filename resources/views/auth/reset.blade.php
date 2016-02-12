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
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="/password/reset">
            <h2>Tu nueva contraseña</h2>
            <hr class="Logo-hr">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">


                    <input type="email" placeholder="E-mail" class="form-control" name="email" value="{{ old('email') }}">
                    <input type="password" placeholder="Contraseña"  class="form-control" name="password">
                    <input type="password" placeholder="Confirmar Contraseña" class="form-control" name="password_confirmation">

            <button type="submit" class="Login-submit"> Restablecer Contraseña</button>

        </form>
    </main>

@endsection
