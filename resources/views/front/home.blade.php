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
            @foreach($products as $product)
                <article class="col-3">
                    <figure class="Product-Image">
                        <a href="{{route('productDetail')}}">
                            {{$bool = true}}
                            @foreach($images as $image)
                                @if($image->product_id == $product->id && $bool == true)
                                    <img src="{{url('uploads/products/'.$image->name)}}" alt="">
                                    {{$bool = false}}
                                @endif
                            @endforeach
                        </a>
                    </figure>
                    <div class="Product-info">
                        <a href="{{route('productDetail')}}"><h4>{{$product->name}}</h4></a>
                        @foreach($subcategories as $subcategory)
                            @if($subcategory->id == $product->subcategory_id)
                                <h5>{{$subcategory->name}}</h5>
                            @endif
                        @endforeach
                        <p>${{$product->offer_price}} <span>${{$product->price}}</span></p>
                        <a href="" class="Button">COMPRAR</a>
                    </div>
                </article>
            @endforeach
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