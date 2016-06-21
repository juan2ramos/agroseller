@extends('layoutBack')

@section('content')

    <div class="title col-12">
        <h2>Proveedor - {{$user->name}}</h2>
        <hr class="Logo-hr">
    </div>
    <section class="BackContainer row" style="position: relative">

        <input class="Tab" id="tab1" type="radio" name="tabs" checked>
        <label class="Tab col-6" for="tab1">Datos generales</label>

        <input class="Tab" id="tab2" type="radio" name="tabs">
        <label class="Tab col-6" for="tab2">Ver Productos</label>

        <span class="Line-bottom-two col-12"></span>

        <!--*********** Ver datos del proveedor ***************** -->

        <article class="TabContainer" id="EditProduct">
            <section class="UserValidate row">
                <section class="BackContainer col-12 row">
                    @if($user->provider['count-number'])
                        <article class="item col-4 row">
                            <a class="Button col-12" href="/uploads/providers/{{$user->provider['count-number']}}" target="_blank">Certificado bancario </a>
                        </article>

                        <article class="item col-4 row">
                            <a class="Button col-12" href="/uploads/providers/{{$user->provider['legal-agent']}}" target="_blank">Cedula representante legal </a>
                        </article>

                        <article class="item col-4 row">
                            <a class="Button col-12" href="/uploads/providers/{{$user->provider['licence']}}" target="_blank">Licencia </a>
                        </article>
                    @else
                        <article class="item col-6 row">
                            <a class="Button col-12" href="/uploads/providers/{{$user->provider['legal-agent']}}" target="_blank">Cedula representante legal </a>
                        </article>

                        <article class="item col-6 row">
                            <a class="Button col-12" href="/uploads/providers/{{$user->provider['licence']}}" target="_blank">Licencia </a>
                        </article>
                    @endif

                    <article class="item col-6">
                        <h3>Nombre : </h3>
                        <span>{{$user->name}} {{$user->second_name}} {{$user->last_name}} {{$user->second_last_name}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Email : </h3>
                        <span>{{$user->email}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Empresa : </h3>
                        <span>{{$user->provider['company-name']}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>NIT : </h3>
                        <span>{{$user->provider->NIT}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Tipo de contribuyente : </h3>
                        <span>{{$user->provider->taxpayer}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Dirección : </h3>
                        <span>{{$user->provider->address}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Sitio web : </h3>
                        <span>{{$user->provider['web-site']}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Tiempo promedio de despacho : </h3>
                        <span>{{$user->provider['dispatch-time']}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Contacto : </h3>
                        <span>{{$user->provider->contact}}</span>
                    </article>
                    <article class="item col-6">
                        <h3>Telefono contacto : </h3>
                        <span>{{$user->provider['contact-phone']}}</span>
                    </article>
                    <article class="item col-12">
                        <h3>Descripción de la empresa : </h3>
                        <span>{{$user->provider->description}}</span>
                    </article>
                    <div class="item col-12">
                        @if($user->provider->validate == 0)
                            <a class="Button" href="{{route('validateProvider', $user->id)}}">Aprobar</a>
                        @endif
                    </div>
                </section>
            </section>
        </article>

        <!--*********** Ver productos del proveedor ***************** -->

        <article class="TabContainer" id="NewProduct">
            <svg width="81px" height="47px" display="none" viewBox="0 0 81 47" version="1.1">
                <g id="imageTemp" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Paso-2" transform="translate(-627.000000, -1870.000000)" fill="#C5C5C5">
                        <g id="imagenes" transform="translate(307.000000, 1823.000000)">
                            <g id="Image" transform="translate(290.000000, 0.000000)">
                                <path d="M110.525,93.2974915 L92.6972512,47 L70.253812,76.5502124 L55.2899396,61.775896 L30,93.2974915 L110.525,93.2974915 Z M40.0227774,49.0124537 C36.6850109,49.0124537 33.9854165,51.7231055 33.9854165,55.0750888 C33.9854165,58.4239127 36.6865905,61.1345646 40.0227774,61.1345646 C43.3573847,61.1345646 46.0585588,58.4239127 46.0585588,55.0750888 C46.0585588,51.7231055 43.3573847,49.0124537 40.0227774,49.0124537 L40.0227774,49.0124537 Z"
                                      id="Shape"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            <div class="BackContainer">
                <section class="Products row" style="padding: 0 40px; margin: 40px 0;">
                    @if(count($products))
                        <table class="Table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Subcategoria</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->subcategory->name}}</td>
                                    @if($product->isValidate && $product->isActive)
                                        <td>Activo</td>
                                    @else
                                        @if($product->isValidate)
                                            <td>Desactivado</td>
                                        @else
                                            <td>Por aprobar</td>
                                        @endif
                                    @endif
                                    <td>
                                        <div class="Item-actions row center">
                                            <input class="ProductId" type="hidden" value="{{$product->id}}">
                                            <a href="{{route('productPreview', $product->id)}}" class="icon-update">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125"><style>.st0{fill:#231F20;} .st1{fill:#FFFFFF;stroke:#231F20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st2{fill:#FFFFFF;stroke:#808080;stroke-width:1.5;} .st3{fill:none;stroke:#808080;stroke-width:1.5;} .st4{fill:url(#SVGID_1_);} .st5{fill:#F2F2F2;} .st6{fill:#D9D9D9;} .st7{fill:none;stroke:#000000;stroke-miterlimit:10;} .st8{fill:#5D5D5D;} .st9{fill:none;stroke:#29ABE2;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st10{fill:none;stroke:#A67C52;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st11{fill:none;stroke:#8CC63F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st12{fill:none;stroke:#000000;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st13{fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;} .st14{fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;} .st15{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;} .st16{fill:none;stroke:#5D5D5D;stroke-width:5;stroke-miterlimit:10;} .st17{fill:none;stroke:#5D5D5D;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st18{fill:none;stroke:#000000;stroke-width:10;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st19{fill:none;stroke:#000000;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st20{fill:none;stroke:#000000;stroke-width:8;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><path d="M50 24.177c-28.032 0-43.866 23.272-44.526 24.263-.632.948-.632 2.172 0 3.12.66.99 16.494 24.263 44.526 24.263S93.866 52.55 94.526 51.56c.632-.948.632-2.172 0-3.12-.66-.99-16.493-24.263-44.526-24.263zm0 42.2c-9.03 0-16.378-7.346-16.378-16.377S40.97 33.622 50 33.622c9.03 0 16.378 7.347 16.378 16.378S59.03 66.378 50 66.378z"/></svg>
                                            </a>
                                            <span class="icon-remove" onclick="return false;">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.254 127.08375000000001"><path d="M7.3 7.276H39.12v-8.28H66.31v8.28h31.823v12.53H7.3m56.288-17.9h-21.3V7.35h21.3zM15.608 25.12H91.36l-9.003 78.535H24.612m54.96-69.806h-7.538l-4.41 63.76h5.747zm-22.712.054h-7.54l.99 63.75h5.747zm-22.713.504h-7.54l6.39 63.63h5.747z"/></svg>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <section class="Products row">
                            <div class="no-data" style="padding:0 30px">
                                <h2>El usuario no tiene productos creados</h2>
                            </div>
                        </section>
                    @endif
                </section>
            </div>
        </article>
    </section>
@endsection
@section('scripts')
    <script src="{{asset('js/products.js')}}"></script>
@endsection