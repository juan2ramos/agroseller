@extends('layout')

@section('content')
    <figure class="Login-logo">
        <img src="{{ url('images/agroseller-logo.png') }}" alt="">
    </figure>

    <a href="{{route('login')}}">
        <button class="Header-login">Inicia Sesión</button>
    </a>
    <main class="Login">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
        <h2 style="font-size: 2rem">¡Recuperar contraseña!</h2>
        <hr class="Logo-hr">
        <form class="form-horizontal" role="form" method="POST" action="/password/email">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">

                <div class="col-md-6">
                    <input type="email" placeholder="E-mail" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="Login-submit">
                       Recuperar Contraseña
                    </button>
                </div>
            </div>
        </form>
    </main>
@endsection
