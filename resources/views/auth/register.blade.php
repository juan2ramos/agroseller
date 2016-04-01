@extends('layout')

@section('content')
    <header class="HeaderAuth">
        <div class="HeaderAuth-content row middle ">
            <figure class="col-6">
                <a href="/"><img src="{{ url('images/agroseller-logo.png') }}" alt=""></a>
            </figure>
            <a class="col-6 end" href="{{route('login')}}">
                <button class="Button">INICIO SESIÓN</button>
            </a>
        </div>
    </header>

    @if (count($errors) > 0)
        <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
    @endif

    <form class="row center middle FormAuth Forms" role="form" method="POST" action="{{ route('register') }}">
        <div class="ContainerBack">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2>¡HAZ PARTE DE AGROSELLER!</h2>
            <label>
                <input type="text"name="name" value="{{ old('name') }}">
                <span>Nombre</span>
            </label>
            <label>
                <input type="email"name="email" value="{{ old('email') }}">
                <span>E-mail</span>
            </label>
            <label>
                <select name="role_id" id="">
                    <option value="0">¿Mi Actividad?</option>
                    <option value="3">Proveedor - Comerciante</option>
                    <option value="4">Cliente - productor</option>
                </select>
            </label>
            <label>
                <input type="number" name="mobile_phone" value="{{ old('mobile_phone') }}">
                <span>Número de teléfono</span>
            </label>
            <label>
                <input type="password" id="password" name="password">
                <span>Contraseña</span>
                <div class="Errors-password"></div>
            </label>
            <label>
                <input type="password" name="password_confirmation">
                <span>Confirmar Contraseña</span>
            </label>

            <label for="policy" class="Forms-checkout" >
                <input type="checkbox" name="policy" id="policy">
                <sub></sub>
                Acepto las politicas de uso del sitio Agrosellers. <a href="">Ver</a>
            </label>
            <label for="terms" class="Forms-checkout">
                <input type="checkbox" name="terms" id="terms" >
                <sub></sub>
                Acepto las politicas de privacidad. <a href="">Ver</a>
            </label>

            <button type="submit" class="Button"> REGISTRATE</button>
        </div>

    </form>

@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/password.js')}}"></script>
@endsection