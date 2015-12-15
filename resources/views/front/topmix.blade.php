@extends('layoutFront')

@section('content')
    <div class="title">FERTILIZANTE</div>
    <div class="Product">
        <figure >
            <img src="{{url('images/products/topmix.jpg')}}" alt="">
        </figure>
        <div class="Product-content">
            <h1>AMINOGEL</h1>
            <h2>Aminoácidos en gel</h2>
            <p>Es un producto a base de aminoácidos en forma de gel, lo cual hace que los ingredientes activos de diferentes  moléculas no interaccionen entre si y por lo cual no se presentan antagonismos iónicos o moleculares.</p>
            <p>Loa aminoácidos por tener cadenas relativamente cortas son biocompatibles, muy rápidamente absorbidas y metabolizadas por las plantas.</p>
            <b class="Product-price">Precio: $150.000</b>
            <button class="Product-button">Añadir a carrito </button>
        </div>
    </div>
    <section class="Cart"></section>
@endsection
