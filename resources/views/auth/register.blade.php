@extends('layout')

@section('content')
    <header class="HeaderAuth">
        <div class="HeaderAuth-content row middle ">
            <figure class="col-6">
                <a href="/"><img src="{{ url('images/logo-agrosellers.svg') }}" alt=""></a>
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
        <div class="BackContainer FormAuth-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2>¡HAZ PARTE DE AGROSELLERS!</h2>
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
                    <option value="0">¿Mi actividad?</option>
                    <option value="3">Proveedor</option>
                    <option value="4">Comprador</option>
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
                <!--<div class="password_validator visible" data-reactid=".0.0.0.0.2.2.4"><div class="validator_container" data-reactid=".0.0.0.0.2.2.4.0"><h4 class="validator_title invalid" data-reactid=".0.0.0.0.2.2.4.0.0"><span data-reactid=".0.0.0.0.2.2.4.0.0.0">Password</span><span data-reactid=".0.0.0.0.2.2.4.0.0.1"> RULES</span></h4><ul class="rules_list" data-reactid=".0.0.0.0.2.2.4.0.1"><li class="" data-reactid=".0.0.0.0.2.2.4.0.1.0"><i class="icon_valid" data-reactid=".0.0.0.0.2.2.4.0.1.0.0"><span data-reactid=".0.0.0.0.2.2.4.0.1.0.0.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.0.0.1"><path fill="#4FB07F" d="M9.5,0C14.7,0,19,4.3,19,9.5S14.7,19,9.5,19S0,14.7,0,9.5S4.3,0,9.5,0z" data-reactid=".0.0.0.0.2.2.4.0.1.0.0.1.0"></path><path fill="#FFFFFF" d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z" data-reactid=".0.0.0.0.2.2.4.0.1.0.0.1.1"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.0.0.2"> </span></i><i class="icon_invalid" data-reactid=".0.0.0.0.2.2.4.0.1.0.1"><span data-reactid=".0.0.0.0.2.2.4.0.1.0.1.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1"><path d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z" data-reactid=".0.0.0.0.2.2.4.0.1.0.1.1.0"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.0.1.2"> </span></i><span class="error_message" data-reactid=".0.0.0.0.2.2.4.0.1.0.2"><span data-reactid=".0.0.0.0.2.2.4.0.1.0.2.0">8</span><span data-reactid=".0.0.0.0.2.2.4.0.1.0.2.1"> characters minimum</span></span></li><li class="" data-reactid=".0.0.0.0.2.2.4.0.1.1"><i class="icon_valid" data-reactid=".0.0.0.0.2.2.4.0.1.1.0"><span data-reactid=".0.0.0.0.2.2.4.0.1.1.0.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.1.0.1"><path fill="#4FB07F" d="M9.5,0C14.7,0,19,4.3,19,9.5S14.7,19,9.5,19S0,14.7,0,9.5S4.3,0,9.5,0z" data-reactid=".0.0.0.0.2.2.4.0.1.1.0.1.0"></path><path fill="#FFFFFF" d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z" data-reactid=".0.0.0.0.2.2.4.0.1.1.0.1.1"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.1.0.2"> </span></i><i class="icon_invalid" data-reactid=".0.0.0.0.2.2.4.0.1.1.1"><span data-reactid=".0.0.0.0.2.2.4.0.1.1.1.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.1.1.1"><path d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z" data-reactid=".0.0.0.0.2.2.4.0.1.1.1.1.0"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.1.1.2"> </span></i><span class="error_message" data-reactid=".0.0.0.0.2.2.4.0.1.1.2"><span data-reactid=".0.0.0.0.2.2.4.0.1.1.2.0">Contains at least </span><span data-reactid=".0.0.0.0.2.2.4.0.1.1.2.1">1</span><span data-reactid=".0.0.0.0.2.2.4.0.1.1.2.2"> capital letter</span></span></li><li class="" data-reactid=".0.0.0.0.2.2.4.0.1.2"><i class="icon_valid" data-reactid=".0.0.0.0.2.2.4.0.1.2.0"><span data-reactid=".0.0.0.0.2.2.4.0.1.2.0.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.2.0.1"><path fill="#4FB07F" d="M9.5,0C14.7,0,19,4.3,19,9.5S14.7,19,9.5,19S0,14.7,0,9.5S4.3,0,9.5,0z" data-reactid=".0.0.0.0.2.2.4.0.1.2.0.1.0"></path><path fill="#FFFFFF" d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z" data-reactid=".0.0.0.0.2.2.4.0.1.2.0.1.1"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.2.0.2"> </span></i><i class="icon_invalid" data-reactid=".0.0.0.0.2.2.4.0.1.2.1"><span data-reactid=".0.0.0.0.2.2.4.0.1.2.1.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.2.1.1"><path d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z" data-reactid=".0.0.0.0.2.2.4.0.1.2.1.1.0"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.2.1.2"> </span></i><span class="error_message" data-reactid=".0.0.0.0.2.2.4.0.1.2.2"><span data-reactid=".0.0.0.0.2.2.4.0.1.2.2.0">Contains at least </span><span data-reactid=".0.0.0.0.2.2.4.0.1.2.2.1">1</span><span data-reactid=".0.0.0.0.2.2.4.0.1.2.2.2"> number</span></span></li><li class="valid" data-reactid=".0.0.0.0.2.2.4.0.1.3"><i class="icon_valid" data-reactid=".0.0.0.0.2.2.4.0.1.3.0"><span data-reactid=".0.0.0.0.2.2.4.0.1.3.0.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.3.0.1"><path fill="#4FB07F" d="M9.5,0C14.7,0,19,4.3,19,9.5S14.7,19,9.5,19S0,14.7,0,9.5S4.3,0,9.5,0z" data-reactid=".0.0.0.0.2.2.4.0.1.3.0.1.0"></path><path fill="#FFFFFF" d="M8.7,12.9c-0.1,0-0.2,0-0.3-0.1l-2.4-2.5c-0.1-0.1-0.1-0.4,0-0.5c0.1-0.2,0.4-0.2,0.5,0L8.7,12l4.6-5 c0.1-0.1,0.4-0.1,0.5,0c0.1,0.2,0.1,0.4,0,0.5L9,12.8C9,12.8,8.9,12.9,8.7,12.9C8.8,12.9,8.8,12.9,8.7,12.9z" data-reactid=".0.0.0.0.2.2.4.0.1.3.0.1.1"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.3.0.2"> </span></i><i class="icon_invalid" data-reactid=".0.0.0.0.2.2.4.0.1.3.1"><span data-reactid=".0.0.0.0.2.2.4.0.1.3.1.0"> </span><svg viewBox="0 0 20 20" data-reactid=".0.0.0.0.2.2.4.0.1.3.1.1"><path d="M10,0.982c4.973,0,9.018,4.046,9.018,9.018S14.973,19.018,10,19.018S0.982,14.973,0.982,10 S5.027,0.982,10,0.982 M10,0C4.477,0,0,4.477,0,10c0,5.523,4.477,10,10,10s10-4.477,10-10C20,4.477,15.523,0,10,0L10,0z M9,5.703 V5.441h2.5v0.262l-0.66,5.779H9.66L9,5.703z M9.44,12.951h1.621v1.491H9.44V12.951z" data-reactid=".0.0.0.0.2.2.4.0.1.3.1.1.0"></path></svg><span data-reactid=".0.0.0.0.2.2.4.0.1.3.1.2"> </span></i><span class="error_message" data-reactid=".0.0.0.0.2.2.4.0.1.3.2"><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.0">Can't be </span><span class="bad_word" data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$0"><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$0.0">"</span><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$0.1">password</span><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$0.2">"</span></span><span class="bad_word" data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$1"><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$1.0">"</span><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$1.1">user</span><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$1.2">"</span></span><span class="bad_word" data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$2"><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$2.0">"</span><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$2.1">username</span><span data-reactid=".0.0.0.0.2.2.4.0.1.3.2.1:$2.2">"</span></span></span></li></ul></div></div>-->
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

            <button type="submit" class="Button submit"> REGISTRATE</button>
        </div>

    </form>

@endsection
@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/password.js')}}"></script>
@endsection