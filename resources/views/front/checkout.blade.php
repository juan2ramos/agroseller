@extends('layoutFront')

@section('content')
    <div class="row Checkout">
        <section class="col-4">
            <h2>1. Resumen de la compra</h2>
            <h3>Verifica tu compra y método ed envío</h3>
            <ul>
                @if(Session::has('cart'))
                    @foreach(Session::get('cart') as $product)
                        <li class="row middle">
                            <figure class="col-5">
                                <img src="{{ url('uploads/products/'.$product->productFiles()->first()->name )}}"
                                     alt="">
                            </figure>
                            <div class="CartDetail-content col-7">
                                <div class="CartDetail-hGroup">
                                    <h3>{{$product->name}}</h3>
                                    <h4>{{$product->subcategory->first()->name}}</h4>
                        <span class="CartDetail-close">
                        <a href="{{route('cartDelete',['id' => $product->id])}}">
                            <svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>delete</title>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Carrito-popUp" transform="translate(-251.000000, -243.000000)"
                                       fill="#253A1B">
                                        <g id="items" transform="translate(11.000000, 94.000000)">
                                            <g id="item" transform="translate(0.000000, 139.000000)">
                                                <g id="delete" transform="translate(240.000000, 10.000000)">
                                                    <path d="M18.9933333,19.7826087 C18.7918841,19.7826087 18.5892754,19.7055072 18.4353623,19.5515942 L0.448405797,1.56463768 C0.140289855,1.25681159 0.140289855,0.756231884 0.448405797,0.448405797 C0.756231884,0.140289855 1.25681159,0.140289855 1.56463768,0.448405797 L19.5515942,18.4353623 C19.8597101,18.7431884 19.8597101,19.2437681 19.5515942,19.5515942 C19.3976812,19.7055072 19.1950725,19.7826087 18.9933333,19.7826087 L18.9933333,19.7826087 Z"
                                                          id="Fill-1"></path>
                                                    <path d="M1.00666667,19.7826087 C0.804927536,19.7826087 0.602318841,19.7055072 0.448405797,19.5515942 C0.140289855,19.2437681 0.140289855,18.7431884 0.448405797,18.4353623 L18.4353623,0.448405797 C18.7431884,0.140289855 19.2437681,0.140289855 19.5515942,0.448405797 C19.8597101,0.756231884 19.8597101,1.25681159 19.5515942,1.56463768 L1.56463768,19.5515942 C1.41072464,19.7055072 1.20927536,19.7826087 1.00666667,19.7826087 L1.00666667,19.7826087 Z"
                                                          id="Fill-2"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </span>
                                </div>
                                <div>
                                    <small>Q:</small>
                                    <span>{{$product->quantity}}</span>
                                    <small></small>
                                    <val>
                                        ${{number_format(($product->offer_price)?$product->offer_price:$product->price, 0, " ", ".")}}</val>
                                </div>
                            </div>
                        </li>

                    @endforeach
                @endif

            </ul>
            <div class="col-12 Total AlignRight">Subtotal: ${{number_format(session('valueTotal'), 0, " ", ".")}}</div>
        </section>
        <section class="col-8">
            <h2>2. Detalle de facturación</h2>
            @if(Auth::check())
                @if(auth()->user()->role_id == 4)
                    <h3>Completa los campos requeridos para realizar tu solicitud</h3>
                    <form action="{{route('newOrder')}}" class="Checkout-form">
                        <label for="name">
                            <input type="text" id="name"
                                   value="{{auth()->user()->name .' '. auth()->user()->last_name}}">
                            <span>Nombre y apellidos completos</span>
                        </label>
                        <label for="identification">
                            <input type="text" id="identification" value="{{auth()->user()->identification}}">
                            <span>Cédula de ciudadania o NIT </span>
                        </label>
                        <label for="address">
                            <input type="text" id="address" value="{{auth()->user()->identification}}">
                            <span>Dirección</span>
                        </label>
                        <label for="loca">
                            <input type="text" placeholder="" value="{{ (auth()->user()->role_id == 4)?'':'' }}">
                            <span>Localidad</span>
                        </label>
                        <label for="">
                            <input type="text" placeholder="" value="{{auth()->user()->mobile_phone}} ">
                            <span>Teléfono</span>
                        </label>
                        <button class="Button">FINALIZAR COMPRA</button>
                    </form>
                @else
                    <p>Para realizar compras debes tener una cuenta cliente </p>
                @endif
            @else
                <h3>
                    Para poder comprar debes tener una cuenta cliente con nosotros, da clic en registrarse y empieza a
                    comprar.
                    Si ya tienes una cuenta inicia sesión y realiza tu compra.
                </h3>
                <div class="row middle arrow" style="margin-top: 3rem">
                    <a href="{{route('register')}}" class="col-3 offset-3 Button">REGISTRATE</a>
                    <a href="{{route('login')}}" class="col-3 offset-1 Button">INICIA SESIÓN</a>
                </div>
            @endif
        </section>
    </div>
@endsection