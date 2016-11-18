@extends('layoutFront')

@section('content')
    <div class="row Checkout">
        <section class="col-12">
            <h2 style="text-align: justify ; font-size: 1.2rem">¡Si desea comparar estos productos en una cotización,
                haga clic en la opción cotizar!</h2>
            <h3>Los productos guardados están sujetos a cambios de precios por parte de los proveedores</h3>
            <ul class="row " style="width: 100%">
                @if(Session::has('cart') &&  Session::get('cart') )
                    @foreach(Session::get('cart') as $product)
                        <li style="margin: 3rem 1rem 0" class="row col-4 middle">
                            <figure class="col-5">
                                <a href="{{route('productDetail',[$product->product->slug, $product->product->id])}}">
                                    <img src="{{ url('uploads/products/'.$product->product->files->first()->name )}}"
                                         alt="">
                                </a>
                            </figure>
                            <div class="CartDetail-content col-7">
                                <div class="CartDetail-hGroup">
                                    <h3>{{$product->product->name}}</h3>
                                    <h4>{{$product->provider->user->name}}</h4>
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
                                    <small>Cantidad:</small>
                                    <span>{{$product->quantity}}</span>
                                    <small></small>
                                    <val>${{number_format($product->price, 0, " ", ".")}}</val>
                                </div>
                            </div>
                        </li>
                    @endforeach
                @endif

            </ul>
            <div class="col-12 Total AlignRight" style="font-size: 1.5rem; padding: 1.25rem 0">Total:
                ${{session('valueTotal')}}</div>
        </section>
        <section class="col-12">
            @if(Session::get('budget'))
                <form id="download" target="_blank" method="post" action="{{route('downloadBudget')}}">
                    <input type="hidden" name="budget_id" id="budget">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
                <div class="MessagePlatform row middle center ">
                    <div class="MessagePlatform-content MessagePlatform-ok">
                        <span class="MessagePlatform-close">X</span>
                        <h2>¡Gracias por utilizar la plataforma agrosellers!</h2>
                        <p> Tu cotización ha sido creado con éxito, para descargar el
                            <a href="javascript: submitform({{Session::get('idBudget')}})"> PDF   haz clic aquí </a> o
                            <a href="admin/mis-presupuestos">aquí</a> para comparar tus productos</p>
                        <p>Gracias por elegirnos.</p>
                        <p class="MessagePlatform-last">Centro de notificaciones <span>Agrosellers</span></p>
                    </div>
                </div>

            @else
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
                            <div class="row center">
                                <a class="Button col-4" style="margin: 2rem 0" href="{{route('addBudget')}}">Cotizar</a>
                            </div>
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
                                           da clic en <a href="'. url('registro') .'">registrarse</a> y empieza a comprar.</p>' .
                                           '<p>Si ya tienes una cuenta inicia sesión y realiza tu compra.</p>'
                                            ])
                        <h3>


                        </h3>
                        <div class="row middle arrow" style="margin: 3rem 0">
                            <a href="{{route('register')}}" class="col-3 offset-3 Button">REGISTRATE</a>
                            <a href="{{route('login')}}" class="col-3 offset-1 Button">INICIA SESIÓN</a>
                        </div>
                    @endif

                    @if(isset($budgetCreate) )
                        @include('messages',[
                               'type' => 'ok',
                               'title' => '¡Gracias por utilizar la plataforma agrosellers!',
                               'message' => '<p> Tu cotización ha sido creado con éxito,  ve al panel administrativo, o haz clic
                               <a href="admin/mis-presupuestos">aquí</a> para comparar tus productos</p>'
                                ])
                    @endif
                @endif
            @endif
        </section>
    </div>
@endsection

@section('scripts')

    <script>
        function submitform(idBudget) {
            $("#budget").val(idBudget);
            $("#download").submit();
        }
    </script>
@endsection
