@extends('layoutFront')

@section('content')

    <section class="BannerTop row">
        <div class="col-3">
            <ul class="Nav-categories">

                @inject('menu', 'Agrosellers\Services\MenuFront')
                @foreach($menu->getCategory() as $key => $category)
                    <li>
                        <div class="row middle">
                            {!!$category->image_icon!!}

                            {{$category->name}}
                            <svg width="7px" style="margin-left: 4px;" height="12px">
                                <use xlink:href="#arrow"/>
                            </svg>
                        </div>
                        <ul>
                            @foreach($category->subcategories as $subcategory)
                                <li>
                                    <div>
                                        <a href="{{route('product',['name' => $subcategory->slug])}}">{{$subcategory->name}}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                @endforeach

            </ul>
        </div>
        <div class="smaller-12 col-9" id="Banner">
            <div>
                <img src="{{url('images/agrosellers-banner.jpg')}}" alt="">
                <div class="BannerTop-info row middle">
                    <div class="smaller-12 medium-6">
                        <h2>CONSULTORÍAS Y ASESORÍAS </h2>
                        <h3>TECNOLOGÍA AGRÍCOLA</h3>
                        <!--<p class="BannerTop-infoPrice"><span>$80.000.000</span> Ahora $50.000.000</p>-->
                    </div>
                    <div class="smaller-12 medium-6 row end" style="padding: 10px 0;"><a class="Button" href="#">VER
                            OFERTA</a></div>
                </div>

            </div>
            <div>
                <img src="{{url('images/2.jpg')}}" alt="">
                <div class="BannerTop-info row middle">
                    <div class="smaller-12 medium-6">
                        <h2>DISEÑO LOGÍSTICA DE COSECHA </h2>
                        <h3>DISEÑO DE PLANTACIONES AGRÍCOLAS</h3>
                        <!--<p class="BannerTop-infoPrice"><span>$80.000.000</span> Ahora $50.000.000</p>-->
                    </div>
                    <div class="smaller-12 medium-6 row end" style="padding: 10px 0;"><a class="Button" href="#">VER
                            OFERTA</a></div>
                </div>

            </div>

            <div>
                <img src="{{url('images/3.jpg')}}" alt="">
                <div class="BannerTop-info row middle">
                    <div class="smaller-12 medium-6">
                        <h2>GEORREFERENCIACIÓN Y ESTUDIOS TOPOGRÁFICOS</h2>
                        <h3>SERVICIOS DE TOPOGRAFÍA</h3>
                        <!--<p class="BannerTop-infoPrice"><span>$80.000.000</span> Ahora $50.000.000</p>-->
                    </div>
                    <div class="smaller-12 medium-6 row end" style="padding: 10px 0;"><a class="Button" href="#">VER
                            OFERTA</a></div>
                </div>

            </div>

        </div>
    </section>
    <figure class="offset-3 col-9"><img style="margin: auto" src="{{asset('images/zona-pagos.jpg')}}" alt=""></figure>

    <section class="Products" id="productsRecommended" data-routegetproductsrecommended="{{route('recommended')}}"
             data-routegetproducts="{{route('allProduct')}}">
        <h2 class="Title">Lo Más Destacado</h2>
        <div class="Product-content row" data-urlpath="{{url('/')}}"
             data-subcategory="{{(isset($subcategoryId))? $subcategoryId : 0 }}">

            @foreach($products as $product)

                <article class="smaller-12 small-6 medium-4 col-3" >
                    <figure class="Product-Image">
                        <a href="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}">
                            @foreach($product->productFiles as $file)
                                @if($file->extension != 'pdf')
                                    <img style="margin: auto;" src="{{url('uploads/products/'.$file->name)}}" alt="">
                                    @break
                                @endif
                            @endforeach
                        </a>
                    </figure>
                    <div class="Product-info">
                        <a href="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}">
                            <h4>{{$product->name}}</h4></a>
                        <h5>{{$product->subcategory->name}}</h5>
                        <?php /*$hasOffer = strtotime($product->offers->offer_on) < strtotime('now') && strtotime($product->offers->offer_off) - strtotime('now') > 0 */?>
                       {{-- @if($hasOffer)
                            <p>${{number_format($product->offers->offer_price, 0, " ", ".")}}
                                <span>${{number_format($product->price, 0, " ", ".")}}</span></p>
                        @else
                            <p>${{number_format($product->price, 0, " ", ".")}}</p>
                        @endif--}}
                        <a href="{{route('productDetail',[$product->slug, $product->id])}}" class="Button">COMPRAR</a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="paginator">

        </div>
    </section>
    <script>
        /*  $(document).ready(function () {
         $("#owl-demo").owlCarousel({
         autoPlay: 3000,
         items: 4,
         itemsDesktop: [1199, 3],
         itemsDesktopSmall: [979, 3]
         });

         });*/
    </script>

@endsection

@section('scripts')
    <script src="{{asset('js/front/products.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}"></script>

    <script>
        $("#Banner").owlCarousel({

            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            navText: ["<", ">"],

        });
    </script>
@endsection

@section('styles')
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet">
@endsection
