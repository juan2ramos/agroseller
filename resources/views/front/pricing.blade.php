@extends('layoutFront')

@section('content')
    <section class="Platform row middle">
        <figure class="col-4"><img src="{{url('images/Platform.jpg')}}" alt=""></figure>
        <div class="Platform-info col-8">
            <p> Obten gratis TODOS los servicios que  te ofrece agroseller. ¡Suscribite AHORA!</p>
            <a href="" class="Button">¡OBTENLO AHORA!</a>
        </div>
    </section>
    <section class="Pricing row middle">
        <article class="col-4">
            <h2>Premium Bronce</h2>
            <h3>Para pequeñas y medianas empresas</h3>
            <div class="Pricing-price">$25.000<small>/mes</small> </div>
            <ul>
                <li><b>100</b> productos </li>
                <li><b>Todos</b> los reportes  </li>
                <li><b>1%</b> Comisión por producto</li>
                <li><b>2</b> Ofertas en banner principal</li>
            </ul>
            <a href="" class="Button">¡OBTENLO AHORA!</a>
        </article>
        <article class="col-4">
            <h2>Premium Bronce</h2>
            <h3>Para empresas que están iniciando</h3>
            <div class="Pricing-price">$60.000<small>/mes</small> <span>El Plan Más Popular</span></div>
            <ul>
                <li><b>100</b> productos </li>
                <li><b>Todos</b> los reportes  </li>
                <li><b>1%</b> Comisión por producto</li>
                <li><b>2</b> Ofertas en banner principal</li>
            </ul>
            <a href="" class="Button">¡OBTENLO AHORA!</a>
        </article>
        <article class="col-4">
            <h2>Premium Bronce</h2>
            <h3>Para grandes empresas</h3>
            <div class="Pricing-price">$95.000<small>/mes</small></div>
            <ul>
                <li><b>100</b> productos </li>
                <li><b>Todos</b> los reportes  </li>
                <li><b>1%</b> Comisión por producto</li>
                <li><b>2</b> Ofertas en banner principal</li>
            </ul>
            <a href="" class="Button">¡OBTENLO AHORA!</a>
        </article>
</section>
@endsection

@section('styles')
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
@endsection