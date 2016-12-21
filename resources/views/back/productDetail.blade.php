@extends('layoutBack')
@section('content')
    <section class="BackContainer  ">
        <div class="row ProductDetailView">

            <h1 class="col-12 small-12">{{$product->name}} <span>{{$product->subcategory->name}}</span></h1>
            <article class="ProductDetail-slider smaller-12 col-5 ">
                <div class="owl-carousel" id="sync1">
                    @foreach($product->files as $file)
                        @if($file->extension != 'pdf')
                            <figure class="item"><img src="{{url('uploads/products/'. $file->name)}}" alt=""></figure>
                        @endif
                    @endforeach
                </div>
            </article>
            <article class="col-7 row small-12 row " style="padding-left: 20px">

                <div class="col-12 ProductDetail-description">
                    {!!$product->description!!}
                </div>

                <ul class="smaller-12 col-12 self-start ">
                    @foreach($featuresTranslate as $features)
                        <li>{{$features['name']}}: <b>{{ $features['value'] }}</b></li>
                    @endforeach
                </ul>

                <div class="col-12 row bottom">
                    <div class="col-8">
                        @foreach($product->files as $file)
                            @if($file->extension == 'pdf')
                                <a href="{{url('uploads/products/'. $file->name)}}" target="_blank" class="Button">FICHA TECNICA</a>
                            @endif
                        @endforeach

                    </div>
                </div>

            </article>

        </div>
    </section>
@endsection
@section('scripts')
    <!-- ******* Slider ******* -->
    <script src="{{asset('js/owl.carousel.js')}}"></script>
    <script src="{{asset('js/front/slide.js')}}"></script>
@endsection

@section('styles')
    <link href="{{asset('css/owl.carousel.css')}}" rel="stylesheet">
    <!--<link href="{{asset('css/owl.transitions.css')}}" rel="stylesheet">-->
@endsection