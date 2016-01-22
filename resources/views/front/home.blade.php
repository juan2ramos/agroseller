@extends('layoutFront')

@section('content')



    {{--<section class="CategoriesHome">

        @foreach($categories as $category)
            <article style="background-image: url('{{ url('uploads/categories/' . $category->url_image ) }}');">
                <a href="productos" class="CategoriesHome-article">
                    <span>{{$category->name}}</span>
                </a>
            </article>
        @endforeach
    </section>--}}
    <div class="Home-top" >
        <nav class="NavCategories">
            <h3>Categorías</h3>
            <ul class="NavCategories-ul">
                @foreach ($categories as $category)
                    <li>
                        {{strtolower($category->name)}}
                        <ul>
                            @foreach($category->subcategories as $subcategory)
                                <li>{{strtolower($subcategory->name)}} </li>
                            @endforeach
                        </ul>
                    </li>

                @endforeach
            </ul>
        </nav>
        <div class="OfferTop">

        </div>
    </div>
    <div class="Products">
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/1.jpg') }}" alt="">
                </figure>
                <figcaption>
                    TOPMIX
                    <span>Fertilizante Organíco</span>
                </figcaption>
            </a>
        </article>

        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/3.jpg') }}" alt="">
                </figure>
                <figcaption>
                    CREATBIO
                    <span>Insecticida</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/4.jpg') }}" alt="">
                </figure>

                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/2.jpg') }}" alt="">
                </figure>
                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/4.jpg') }}" alt="">
                </figure>
                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>

            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/2.jpg') }}" alt="">
                </figure>
                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/1.jpg') }}" alt="">
                </figure>
                <figcaption>
                    TOPMIX
                    <span>Fertilizante Organíco</span>
                </figcaption>
            </a>
        </article>

        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/3.jpg') }}" alt="">
                </figure>
                <figcaption>
                    CREATBIO
                    <span>Insecticida</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/4.jpg') }}" alt="">
                </figure>

                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/2.jpg') }}" alt="">
                </figure>
                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/4.jpg') }}" alt="">
                </figure>
                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
        <article>
            <a href="{{url('productos/topmix')}}">
                <figure>
                    <img src="{{ url('images/products/2.jpg') }}" alt="">
                </figure>
                <figcaption>
                    NEUDORFF
                    <span>Fertilizante universal</span>
                </figcaption>
            </a>
        </article>
    </div>
    <div class="title">ASOCIADOS</div>
    <section class="associatedHome">
        <div id="owl-demo" class="owl-carousel">
            <div class="item"><img src="{{ url('images/a1.jpg') }}" alt="Owl Image"></div>
            <div class="item"><img src="{{ url('images/s2.jpg') }}" alt="Owl Image"></div>
            <div class="item"><img src="{{ url('images/s3.jpg') }}" alt="Owl Image"></div>
            <div class="item"><img src="{{ url('images/s2.jpg') }}" alt="Owl Image"></div>
            <div class="item"><img src="{{ url('images/a1.jpg') }}" alt="Owl Image"></div>
            <div class="item"><img src="{{ url('images/s2.jpg') }}" alt="Owl Image"></div>
            <div class="item"><img src="{{ url('images/s3.jpg') }}" alt="Owl Image"></div>
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