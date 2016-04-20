@extends('layoutFront')

@section('content')

    <section class="Products">
        @foreach($products as $product)
            <article>
                <a href="{{url('productos/'.$product->slug)}}">
                    <figure>
                        <img src="{{ url('uploads/products/',$product['image-scale']) }}" alt="">
                    </figure>
                    <figcaption>
                        {{$product->name}}
                        <span></span>
                    </figcaption>
                </a>
            </article>
        @endforeach

        {{-- <article>
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
         </article>--}}
    </section>
@endsection
