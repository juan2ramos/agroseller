<?php $role = [1=>'Super Administrador',2 => 'Administrador', 3 => 'Proveedor', 4 => 'Cliente'] ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agroseller</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>

</head>
<body>
<div class="Bar">
    <figure class="Bar-logo">
        <img src="{{ url('images/agroseller-logo.png') }}" alt="">
    </figure>
    <div class="Bar-user">
        <figure><img src="{{url('images/pp.svg')}}" alt=""></figure>
        <h4>{{ auth()->user()->name }} <span> {{ $role[auth()->user()->role_id] }}</span></h4>
    </div>
    <nav class="Nav">
        <ul>
            <li><a href="{{ route('admin') }}"><span class="icon-leaf"></span>Inicio</a></li>
            <li><a href="{{ route('users') }}"><span class="icon-user2"></span>Usuarios</a></li>
            <li><a href=""><span class="icon-settings"></span>Permisos</a></li>
            <li><a href=""><span class="icon-briefcase"></span>Proveedores</a></li>
            <li><a href="{{ route('category') }}"><span class="icon-notebook"></span>Categorias</a></li>
            <li><a href=""><span class="icon-user"></span>Clientes</a></li>
            <li><a href=""><span class="icon-credit"></span>Ofertas</a></li>
            <li><a href=""><span class="icon-wallet"></span>Facturas</a></li>
            <li><a href=""><span class="icon-cart"></span>Pedidos</a></li>
            <li><a href=""><span class="icon-bars"></span>Reportes</a></li>
        </ul>
    </nav>

</div>
<main class="container">

    <header class="Header">
        <h1><span class="icon-leaf"></span> Bienvenido a Agroseller </h1>

        <div class="Header-messages">
            <span class="icon-bell active"></span>
            <span class="icon-bubbles"></span>
            <a href="{{ url('logout') }}"><span class="icon-switch"></span></a>
        </div>
    </header>


    @yield('content')

</main>
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>