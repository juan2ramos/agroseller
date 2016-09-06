<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('openGraph')
    <title>Agroseller</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <!-- ********************** Borrar *********************
    <link href="{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{asset('css/owl.transitions.css')}}" rel="stylesheet">
     ********************** Borrar ********************* -->
    @yield('styles')
            <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
</head>
<body>


<header class="Header ">
    <div class="Header-content row">
        <div class="col-8 small-12 row center middle padd">
            <h1>Es importante para todo Empresario de agro  conocer y analizar los costos de producción.</h1>
        </div>
        <form action="" class="col-4 padd  small-12 ">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone">
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email">
            <label for="city">Nombre</label>
            <select name="city" id="city">
                <option value=""></option>
                <option value="Bogotá">Bogotá</option>
                <option value="Medellín">Medellín</option>
            </select>
            <label for="comments">Comentario</label>
            <textarea name="comments" id="comments"></textarea>
            <div class="row end">
                <button>Enviar</button>
            </div>
        </form>
    </div>
</header>
<main>
    <h2>Administración y costos del cultivo</h2>
    <section class="row">
        <article class="col-4 small-12 ">
            <h3>Estimar costos</h3>
            <p>El objetivo de la capacitación dar a conocer los puntos establecidos en la certificación de las buenas prácticas agrícolas (BPA)</p>
        </article>
        <article class="col-4  small-12 ">
            <h3>Presupuestar costos </h3>
            <p>con el fin de obtener productos sanos, frescos y que cumplen con los estándares de calidad</p>
        </article>
        <article class="col-4  small-12 ">
            <h3>Controlar costos</h3>
            <p>el conocimiento y análisis de los costos, suministra la información de retorno (retroalimentación), es posible medir el comportamiento sobre la eficiencia</p>
        </article>
    </section>
</main>
<footer class="Footer">

</footer>

<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/front/main.js')}}"></script>
<script src="{{asset('js/search.js')}}"></script>

@yield('scripts')
@yield('socialScripts')
</body>
</html>