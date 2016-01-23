@extends('layoutFront')
<?php $taxes = [1 => 'Iva', 2 => 'Retefuente'] ?>
@section('content')
    <div class="Product">
        <div class="Product-content">
            <figure>
                <img src="{{url('uploads/products/',$product['image-scale'])}}" alt="">
            </figure>

            <h1>{{$product->name}}</h1>
            <h2>{{$product->subcategory->name}}</h2>
            <article class="Product-features">
                <h4>Ubicaciones</h4>
                <div id="map" data-location="{{$product->location}}"></div>
                {!! $product['forms-employment'] !!}
                <ul>
                    {!! !empty($product->presentation) ? '<li>Presentación : <span>'.$product->presentation. '</span></li>' : '' !!}
                    {!! !empty($product->size) ? '<li>Tamaño : <span>'.$product->size . '</span></li>' : '' !!}
                    {!! !empty($product->weight) ? '<li>Peso : <span> '. $product->weight . '</span></li>' : '' !!}
                    {!! !empty($product->measure) ? '<li>Medida : <span> '. $product->measure . '</span></li>' : '' !!}
                    {!! !empty($product->material) ? '<li>Material : <span> '. $product->material . '</span></li>' : '' !!}
                    {!! !empty($product->description) ? '<li>Descripción : <span> '. $product->description . '</span></li>' : '' !!}
                    {!! !empty($product->composition) ? '<li>Composición : <span> '. $product->composition . '</span></li>' : '' !!}
                    @if(!empty($product->taxes))
                        <?php $taxesArray = explode(';', $product->taxes) ?>
                        <li>Impuestos :
                            @foreach($taxesArray as $tax)
                                <span> {{$taxes[$tax]}} </span>
                            @endforeach
                        </li>
                    @endif

                    {!! !empty($product['available-quantity']) ? '<li>Cantidad disponible : <span> '. $product['available-quantity']. '</span></li>' : '' !!}
                </ul>

            </article>
            <button class="Product-button">Añadir a carrito</button>
        </div>
        <div class="Product-offer">
            <span>Descuento</span>
            <h4>${{$product['offer-price']}}</h4>
            <a href="" class="Product-offerBuy">COMPRAR</a>
            <p class="Product-offerValue">Valor : <span>${{$product->price}}</span></p>
            <p>tiempo limitado</p>
            <div class="Product-offerTime">
                <div id="date" data-time="{{$product['offer-off']}}"></div>

                <span id="dayNumber"></span>
                <span id="hourNumber"></span>
                <span id="minNumber"></span>
                <span id="secNumber"></span>
            </div>

        </div>
    </div>
    <section class="Cart"></section>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/front/product.js')}}"></script>
@endsection