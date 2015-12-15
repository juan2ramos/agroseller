@extends('layoutFront')

@section('content')
   <div class="title">CATEGORÍAS</div>
    <section class="CategoriesHome">
        <article><a href="productos" class="CategoriesHome-article"><span>FERTILIZANTES</span></a></article>
        <article><a href="productos"  class="CategoriesHome-article"><span>INSUMOS AGRÍCOLAS</span></a></article>
        <article><a href="productos"  class="CategoriesHome-article"><span>LOGÍSTICA Y TRANSPORTE</span></a></article>
        <article><a href="productos"  class="CategoriesHome-article"><span>MAQUINARIA AGRÍCOLA</span></a></article>
        <article><a href="productos" class="CategoriesHome-article"><span>SERVICIOS ESPECIALIZADOS</span></a></article>
        <article><a href="productos" class="CategoriesHome-article"><span>TECNOLOGÍA AGRÍCOLA</span></a></article>
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
       $(document).ready(function() {
           $("#owl-demo").owlCarousel({
               autoPlay: 3000,
               items : 4,
               itemsDesktop : [1199,3],
               itemsDesktopSmall : [979,3]
           });

       });
   </script>
@endsection