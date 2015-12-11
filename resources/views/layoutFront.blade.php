<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agroseller</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleFront.css') }}">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>

</head>
<body>

<header class="Header">
    <figure class="Header-figure">
        <img src="{{ url('images/agroseller-logo.png')  }}" alt="">
    </figure>
    <h2>El directorio agrario #1 en Colombia</h2>
</header>
<nav class="Nav">
    <div class="Nav-user">Miller Preciado</div>
    <ul>
        <li>Inicio</li>
        <li>Directorio</li>
        <li>Clientes</li>
        <li>Contáctenos</li>
    </ul>
</nav>
<div class="Banner"></div>
<div class="Search">
    <div class="Search-content">
        <h3>AQUÍ ENCUENTRAS LO QUE NECESITAS.</h3>
        <input type="text">
        <select name="" id="">
            <option value="">ciudad</option>
            <option value="">Bogotá</option>
            <option value="">Cali</option>
        </select>
        <button>Buscar</button>
    </div>
</div>
@yield('content')
<footer class="Footer">
    <div class="Footer-content">
        <figure>
            <img src="{{url('images/agroseller-logo.png')}}" alt="">
        </figure>
        <nav class="NavFooter">
            <ul>
                <li>Acerca de</li>
                <li> AgroSeller</li>
                <li> Pauta con nosotros</li>
                <li> Contáctanos</li>
                <li>  Mapa del Sitio</li>
            </ul>
        </nav>
            <ul>
                <li>Acerca de</li>
                <li> AgroSeller</li>
                <li> Pauta con nosotros</li>
                <li> Contáctanos</li>
                <li>  Mapa del Sitio</li>
            </ul>
        </nav>
            <ul>
                <li>Acerca de</li>
                <li> AgroSeller</li>
                <li> Pauta con nosotros</li>
                <li> Contáctanos</li>
                <li>  Mapa del Sitio</li>
            </ul>
        </nav>
    </div>
    <div class="copy">Copyright © 2015 Creado por Agroseller</div>
</footer>
@yield('scripts')
</body>
</html>