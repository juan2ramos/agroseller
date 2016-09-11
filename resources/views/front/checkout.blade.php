@extends('layoutFront')

@section('content')
    <div class="row Checkout">
        <section class="col-4">
            <h2>1. Resumen de la compra</h2>
            <h3>Verifica tu compra y método ed envío</h3>
            <ul>
                @if(Session::has('cart') &&  Session::get('cart'))
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
            <div class="col-12 Total AlignRight">Subtotal: ${{( !empty(session('valueTotal')))? session('valueTotal') : '' }}</div>
        </section>
        <section class="col-8">
            <h2>2. Detalle de facturación</h2>
            @if(!  Session::get('cart'))
                @include('messages',[
                    'type' => 'warning',
                    'title' => '¡Lo sentimos!',
                    'message' => '<p> tu carrito esta vacio, vuelve a
                     <a href="'. route('home') .'">Inicio</a> Busca tu producto en la barra  de arriba. </p>'
                     ])
            @else

                @if(Auth::check())
                    @if(auth()->user()->role_id == 4)
                        <h3>Completa los campos requeridos para realizar tu solicitud</h3>
                        <!-- GUARDAR ORDEN POR POST EN {{route('newOrder')}} -->
                        <form action="https://www.zonapagosdemo.com/api_inicio_pago/api/inicio_pagoV2" method="POST" class="Checkout-form">

                            <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                            <input type="hidden" name="id_tienda" value="14992">
                            <input type="hidden" name="clave" value="PYP1234">
                            <input type="hidden" name="codigo_servicio_principal" value="2701">

                            <input type="hidden" name="email" value="{{auth()->user()->email}}">
                            <input type="hidden" name="total_con_iva" value="{{( !empty(session('valueTotal'))) ? (int)str_replace('.', '', session('valueTotal')) : '' }}">
                            <input type="hidden" name="valor_iva" value="0">
                            <input type="hidden" name="Id_pago" value="{{date_format(new \Jenssegers\Date\Date(), 'YmdHis') . rand(10, 99)}}">

                            <input type="hidden" name="lista_codigos_servicio_multicredito" value="">
                            <input type="hidden" name="lista_nit_codigos_servicio_multicredito" value="">
                            <input type="hidden" name="lista_valores_con_iva" value="">
                            <input type="hidden" name="lista_valores_iva" value="">
                            <input type="hidden" name="total_codigos_servicio" value="0">

                            <input type="hidden" name="descripcion_pago" value="orem ipsum dolor sit amet, consectetur adipisicing elit.">

                            <label for="name">
                                <input type="text" id="name" name="nombre_cliente"
                                       value="{{auth()->user()->name .' '. auth()->user()->last_name}}">
                                <span>Nombre y apellidos completos</span>
                            </label>
                            <label for="document_type">
                                <select name="tipo_id" id="document_type">
                                    <option value="1">CC Cedula de Ciudadanía</option>
                                    <option value="2">CE Cedula de Extranjería</option>
                                    <option value="3">NIT</option>
                                    <option value="6">PP Pasaporte</option>
                                </select>
                            </label>
                            <label for="identification">
                                <input type="text" name="Id_cliente" id="identification"
                                       value="{{auth()->user()->identification}}">
                                <span>Número de documento </span>
                            </label>
                            <label for="address">
                                <input type="text" id="address" value="{{auth()->user()->address}}"
                                       name="address_client">
                                <span>Dirección de envío</span>
                            </label>
                            <label for="mobile">
                                <input type="text" id="mobile" name="telefono_cliente"
                                       value="{{auth()->user()->mobile_phone}}">
                                <span>Teléfono</span>
                            </label>
                            <button class="Button">FINALIZAR COMPRA</button>
                        </form>
                    @else
                        @include('messages',[
                        'type' => 'warning',
                        'title' => '¡Lo sentimos!',
                        'message' => '<p> Para realizar compras debes tener o crear  una cuenta como cliente, da clic
                         <a href="'. route('login') .'">aqui</a> si ya posees una cuenta o
                         <a href="'. route('register') .'">aqui</a> si te quieres registrar </p>'
                         ])
                    @endif
                @else
                    @include('messages',[
                                       'type' => 'warning',
                                       'title' => '¡Lo sentimos!',
                                       'message' => '<p> Para poder comprar debes tener una cuenta cliente con nosotros,
                                       da clic en registrarse y empieza a comprar.</p>' .
                                       '<p>Si ya tienes una cuenta inicia sesión y realiza tu compra.</p>'
                                        ])

                    <div class="row middle arrow" style="margin-top: 3rem">
                        <a href="{{route('register')}}" class="col-3 offset-3 Button">REGISTRATE</a>
                        <a href="{{route('login')}}" class="col-3 offset-1 Button">INICIA SESIÓN</a>
                    </div>
                @endif
                @if(!empty($success))
                    @include('messages',[
                     'type' => 'ok',
                     'title' => '¡Enhorabuena!',
                     'message' => '<p>  Tu  compra se ha realizado con exito, puedes revisar el estado en compras en el
                     administrador</p>'
                      ])
                @endif
            @endif
        </section>
    </div>
@endsection