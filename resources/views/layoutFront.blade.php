<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agroseller</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleFront.css') }}">
    <link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.transitions.css') }}" rel="stylesheet">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>

    <script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
</head>
<body>

<header class="Header">
    <div class="Search">
        <div class="Search-content">
            <figure class="Header-figure">
                <a href="/"><img src="{{ url('images/agroseller-logo.png')  }}" alt=""></a>
            </figure>

            <form action="" class="Search-form">
                <input type="text">
                <select name="" id="">
                    <option value="">ciudad</option>
                    <option value="">Bogotá</option>
                    <option value="">Cali</option>
                </select>
                <button>Buscar</button>
            </form>
        </div>
    </div>

    <a href="{{ route('register') }}" class="Header-register">Registrate</a>
</header>
<nav class="Nav">
    @if(Auth::user())
        <a href="{{ route('admin') }}" class="Header-login"> {{Auth::user()->name}} {{Auth::user()->last_name}}</a>
    @else
        <a href="{{ route('login') }}" class="Header-login">Inicio sesión</a>
    @endif
    <div class="Nav-user"></div>
    <ul>
        <li><a href="/">Inicio </a></li>
        <li><a href="#">Directorio</a></li>
        {{-- <li><a href="{{ route('admin') }}">Clientes</a></li>--}}
        <li><a href="#">Contáctenos</a></li>
    </ul>
        <a class="Shopping">@include('front.tractor') $0</a>

</nav>


@yield('content')
<footer class="Footer">
    <div class="Footer-content">
        <figure class="Footer-logo">
            <img src="{{url('images/agroseller-logo.png')}}" alt="">
        </figure>
        <nav class="NavFooter">
            <ul>
                <li class="NavFooter-TitleUL">Acerca de</li>
                <li><a href="#"> AgroSeller</a></li>
                <li><a href="#"> Pauta con nosotros</a></li>
                <li><a href="#"> Contáctanos</a></li>
                <li><a href="#"> Mapa del Sitio</a></li>
            </ul>

            <ul>
                <li class="NavFooter-TitleUL">Ayuda</li>
                <li><a href="#"> Comprar</a></li>
                <li><a href="#"> Vender</a></li>
                <li><a href="#"> Preguntas frecuentes</a></li>
                <li><a href="#"> Centro de seguridad</a></li>
            </ul>

            <ul>
                <li class="NavFooter-TitleUL">Mi cuenta</li>
                <li><a href="#"> Resumen </a></li>
                <li><a href="#"> Favoritos</a></li>
                <li><a href="#"> Vender</a></li>
            </ul>

            <ul>
                <li class="NavFooter-TitleUL">Redes Sociales</li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#"> Twitter</a></li>
                <li><a href="#"> Google +</a></li>
            </ul>
        </nav>


    </div>
    <div class="copy">Copyright © 2015 Creado por Agroseller</div>
    <sidebar class="YouCart">

        <section class="YouCart-content">
            <h3>Tus Compras</h3>
            <ul class="YouCart-list">
                <li>
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <div class="YouCart-item">
                        <h5>Nombre</h5>
                        <small>Esta es una pequña descripción</small>
                        <button class="YouCart-more">+</button>
                        <button class="YouCart-less">-</button>
                        <button class="YouCart-delete">X</button>
                    </div>
                </li>
                <li>
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <div class="YouCart-item">
                        <h5>Nombre</h5>
                        <small>Esta es una pequña descripción</small>
                        <button class="YouCart-more">+</button>
                        <button class="YouCart-less">-</button>
                        <button class="YouCart-delete">X</button>
                    </div>
                </li>

                <div class="YouCart-checkout">
                    <span>Subtotal</span>
                    <span>$300.000</span>
                    <button class="YouCart-checkoutButton">COMPRAR</button>
                </div>

            </ul>
        </section>
        <div class="YouCart-closed"></div>
    </sidebar>
</footer>
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
@yield('scripts')
</body>
</html>