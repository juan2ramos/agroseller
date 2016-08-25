@extends('layoutFront')

@section('content')

    <section class="BannerTop row">
        <div class="small-3">
            <ul class="Nav-categories">

                @inject('menu', 'Agrosellers\Services\MenuFront')
                @foreach($menu->getCategory() as $key => $category)
                    <li>
                        <div>{{$category->name}}
                            <svg width="7px" height="12px">
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
        <div class="small-9">
            <img src="{{url('images/image-banner.jpg')}}" alt="">
            <div class="BannerTop-info row middle">
                <div class="small-6 ">
                    <h2>TRACTOR VALTRA A850</h2>
                    <h3>ENTREGA INMENDIATA</h3>
                    <p class="BannerTop-infoPrice"><span>$80.000.000</span> Ahora $50.000.000</p>
                </div>
                <div class="small-6 AlignRight"><a class="Button" href="">VER OFERTA</a></div>
            </div>
        </div>
    </section>
    <section class="Products">
        <h2 class="Title">Lo Más Destacado</h2>
        <div class="Product-content row">
            @foreach($products as $product)
                <article class="small-3">
                    <figure class="Product-Image">
                        <a href="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}">
                            @foreach($product->productFiles as $file)
                                @if($file->extension != 'pdf')
                                    <img src="{{url('uploads/products/'.$file->name)}}" alt="">
                                    @break
                                @endif
                            @endforeach
                        </a>
                    </figure>
                    <div class="Product-info">
                        <a href="{{route('productDetail', ['slug' => $product->slug, 'id' => $product->id])}}">
                            <h4>{{$product->name}}</h4></a>
                        <h5>{{$product->subcategory->name}}</h5>
                        <?php $hasOffer = strtotime($product->offers->offer_on) < strtotime('now') && strtotime($product->offers->offer_off) - strtotime('now') > 0 ?>
                        @if($hasOffer)
                            <p>${{number_format($product->offers->offer_price, 0, " ", ".")}}
                                <span>${{number_format($product->price, 0, " ", ".")}}</span></p>
                        @else
                            <p>${{number_format($product->price, 0, " ", ".")}}</p>
                        @endif
                        <a href="{{route('productDetail',[$product->slug, $product->id])}}" class="Button">COMPRAR</a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="paginator">
            {!! $products->render() !!}
        </div>
    </section>
    <div class="row around middle " style="padding: 20px 0 40px">
       <figure class="small-2"> <img  src="{{asset('images/prueba 01.png')}}" alt=""></figure>
        <figure class="small-2"> <img  src="{{asset('images/prueba 02.png')}}" alt=""></figure>
    </div>
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