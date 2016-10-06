@extends('layout')

@section('content')
    <header class="HeaderAuth Header-container">
        <div class="HeaderAuth-content row middle">
            <figure class="smaller-6 col-3">
                <a href="/"><img src="{{ url('images/logo-agrosellers.svg') }}" alt=""></a>
            </figure>
            <div class="Header-linksBack smaller-6  col-9 row end">
                <a class="Register Button" href="{{route('register')}}">REGÍSTRATE</a>
            </div>
        </div>
    </header>
    <form class="row center middle FormAuth Forms Login" role="form" method="POST" action="{{ route('login') }}">
        <div class="BackContainer FormAuth-container smaller-12">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h2>INICIO DE SESIÓN</h2>
            @if (!empty($errorArray["email"])) <span class="Login-error">{{ $errorArray["email"][0] }} </span>@endif
            <label for="email">
                <input type="email" name="email" value="{{ old('email') }}">
                <span>E-mail</span>
            </label>

            @if (!empty($errorArray["password"]))
                <span class="Login-error">{{ $errorArray["password"][0] }} </span>
            @endif

            <label for="password">
                <input type="password" name="password">
                <span>Contraseña</span>
            </label>
            <a class="login-restartPassword" href="/password/email">Olvido su contraseña?</a>

            <button  type="submit" class="Button submit">INICIO DE SESIÓN</button>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection