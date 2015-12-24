@extends('layoutFront')

@section('content')
    <div class="title">CATEGORÍAS</div>


    <section class="CategoriesHome">

        @foreach($categories as $category)
            <article style="background-image: url('{{ url('uploads/categories/' . $category->url_image ) }}');">
                <a href="productos" class="CategoriesHome-article">
                    <span>{{$category->name}}</span>
                </a>
            </article>
        @endforeach
    </section>
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