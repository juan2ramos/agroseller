@extends('layoutFront')

@section('content')

    <section class="BannerTop">
        <img src="{{url('images/image-banner.jpg')}}" alt="">
        <div class="BannerTop-info row middle">
            <div class="col-6 ">
                <h2>TRACTOR VALTRA A850</h2>
                <h3>ENTREGA INMENDIATA</h3>
                <p class="BannerTop-infoPrice"><span>$80.000.000</span> Ahora $50.000.000</p>
            </div>
            <div class="col-6 AlignRight"><a class="Button" href="">VER OFERTA</a></div>
        </div>
    </section>
    <section class="Products">
        <h2 class="Title">Lo Más Destacado</h2>
        <div class="Product-content row">
            <article class="col-3">
                <figure class="Product-Image">
                    <a href="{{route('productDetail')}}"> <img src="{{url('images/inquifersa.jpg')}}" alt=""></a>
                </figure>
                <div class="Product-info">
                    <a href="{{route('productDetail')}}"><h4>Inquifersa</h4></a>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>

                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/potassio.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Nitro Potassio</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/glyfos.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Glyfos</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/cosmo.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Cosmos O-C</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/inquifersa.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Inquifersa</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/potassio.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Nitro Potassio</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/glyfos.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Glyfos</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
            <article class="col-3">
                <figure class="Product-Image">
                    <img src="{{url('images/cosmo.jpg')}}" alt="">
                </figure>
                <div class="Product-info">
                    <h4>Cosmos O-C</h4>
                    <h5>Fertilizante </h5>
                    <p>$50.000 <span>$80.000</span></p>
                    <a href="" class="Button">COMPRAR</a>
                </div>
            </article>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $("#owl-demo").owlCarousel({
                autoPlay: 3000,
                items: 4,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]
            });

        });
    </script>
@endsection