@extends('layoutBack')
@section('content')
    <section class="BackContainer row" style="position: relative">

        <input class="Tab" id="tab1" type="radio" name="tabs" checked>
        <label class="Tab col-6" for="tab1">Ver Productos</label>

        <input class="Tab" id="tab2" type="radio" name="tabs">
        <label class="Tab col-6" for="tab2">Nuevo Producto</label>

        <span class="Line-bottom-two col-12"></span>

        <article class="TabContainer" id="EditProduct">
            <!--<input id="deleteProductRoute" type="hidden" value="{route('deleteProduct')}}">-->
            <section class="Products row">
                @if(count($products) > 0)
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
                                        <a href="{{route('editProduct', [$product->id])}}" class="icon-update">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px"
                                                 y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100"
                                                 xml:space="preserve"><path
                                                        d="M50,5C25.1,5,5,25.1,5,50c0,24.9,20.1,45,45,45s45-20.1,45-45C95,25.1,74.9,5,50,5z M25.6,73.7l7.6-16.4l8.8,8.8L25.6,73.7z   M43,65.2l-8.8-8.8l23.2-23.2l8.8,8.8L43,65.2z M67.1,41l-8.8-8.8l9.4-9.4l8.8,8.8L67.1,41z"/></svg>
                                        </a>
                                        @if($product->isValidate)
                                            <form method="POST" action="{{route('deleteProduct', $product->id)}}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="icon-remove">
                                                    @if($product->isActive)
                                                        <svg width="100%" height="100%" viewBox="0 0 500 500">
                                                            <g>
                                                                <path d="M400,0h-66.667c-55.141,0-100,44.859-100,100v100H25c-13.75,0-25,11.25-25,25v250c0,13.75,11.25,25,25,25h283.333 c13.751,0,25-11.25,25-25V225c0-13.75-11.249-25-25-25H300V100c0-18.38,14.953-33.333,33.333-33.333H400 c18.38,0,33.333,14.953,33.333,33.333v100H500V100C500,44.859,455.141,0,400,0z M200,433.333h-66.667l14.5-72.5 c-8.754-6.007-14.5-16.08-14.5-27.5c0-18.409,14.924-33.333,33.333-33.333S200,314.924,200,333.333c0,11.42-5.746,21.493-14.5,27.5L200,433.333z"/>
                                                            </g>
                                                        </svg>
                                                    @else
                                                        <svg viewBox="0 0 489.4 489.4">
                                                            <g>
                                                                <g>
                                                                    <path d="M99,147v51.1h-3.4c-21.4,0-38.8,17.4-38.8,38.8v213.7c0,21.4,17.4,38.8,38.8,38.8h298.2c21.4,0,38.8-17.4,38.8-38.8V236.8 c0-21.4-17.4-38.8-38.8-38.8h-1v-51.1C392.8,65.9,326.9,0,245.9,0C164.9,0.1,99,66,99,147z M267.7,353.2c-3,2.2-3.8,4.3-3.8,7.8 c0.1,15.7,0.1,31.3,0.1,47l0,0c0.3,6.5-3,12.9-8.8,15.8c-13.7,7-27.4-2.8-27.4-15.8v-0.1c0-15.7,0-31.4,0.1-47.1 c0-3.2-0.7-5.3-3.5-7.4c-14.2-10.5-18.9-28.4-11.8-44.1c6.9-15.3,23.8-24.3,39.7-21.1c17.7,3.6,30,17.8,30.2,35.5 C282.5,336,277.6,346,267.7,353.2z M163.3,147c0-45.6,37.1-82.6,82.6-82.6c45.6,0,82.6,37.1,82.6,82.6v51.1H163.3V147z"/>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    @endif
                                                </button>
                                            </form>
                                        @else
                                            <span style="cursor: inherit" class="icon-" onclick="return false;">
                                            <svg viewBox="0 0 489.4 489.4">
                                                <g>
                                                    <g>
                                                        <path style="fill:#d3d3d3"
                                                              d="M99,147v51.1h-3.4c-21.4,0-38.8,17.4-38.8,38.8v213.7c0,21.4,17.4,38.8,38.8,38.8h298.2c21.4,0,38.8-17.4,38.8-38.8V236.8 c0-21.4-17.4-38.8-38.8-38.8h-1v-51.1C392.8,65.9,326.9,0,245.9,0C164.9,0.1,99,66,99,147z M267.7,353.2c-3,2.2-3.8,4.3-3.8,7.8 c0.1,15.7,0.1,31.3,0.1,47l0,0c0.3,6.5-3,12.9-8.8,15.8c-13.7,7-27.4-2.8-27.4-15.8v-0.1c0-15.7,0-31.4,0.1-47.1 c0-3.2-0.7-5.3-3.5-7.4c-14.2-10.5-18.9-28.4-11.8-44.1c6.9-15.3,23.8-24.3,39.7-21.1c17.7,3.6,30,17.8,30.2,35.5 C282.5,336,277.6,346,267.7,353.2z M163.3,147c0-45.6,37.1-82.6,82.6-82.6c45.6,0,82.6,37.1,82.6,82.6v51.1H163.3V147z"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $products->render() !!}
                @else
                    <div class="no-data">
                        <h2>No tiene producctos creados</h2>
                    </div>
                @endif
            </section>

            <!--<div class="DeleteMessage MessagePlatform row middle center" style="display: none">
                <div class="MessagePlatform-content" style="text-align: center;">
                    <h2>!Desactivar el producto!</h2>
                    <p>¿Esta seguro que desea desactivar el producto?</p><div class="Message"></div>
                    <div class="MessagePlatform-confirm">
                        <form style="opacity:0;" id="DeleteForm" action="{{url('admin/productos/delete')}}" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="submit">
                        </form>
                        <button class="Button" id="Accept" onclick="return false">Desactivar</button>
                        <button class="Button" id="Cancel">Cancelar</button>
                    </div>
                </div>
            </div>-->
        </article>

        <article class="TabContainer col-12" id="NewProduct">
            <form id="Product-form" role="form" method="POST" action="{{ route('newProduct') }}"
                  enctype="multipart/form-data">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">

                <section class="Wizard">
                    <ul class=" row middle center">
                        <li class="col-3 current" data-id="1">
                            <svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Paso-1" transform="translate(-342.000000, -138.000000)" fill="#C5D257">
                                        <g id="icons" transform="translate(315.000000, 138.000000)">
                                            <g id="noun_106902_cc" transform="translate(27.000000, 0.000000)">
                                                <g id="Group">
                                                    <path d="M15,2 L7.8755,2 L7.266,0.752 C6.969,0.0955 6.5035,0 5.9505,0 L0.9525,0 C0.401,0 0,0.4475 0,1 L0,14.992 C0,15.545 0.448,16 0.9995,16 L15,16 C15.5525,16 16,15.5525 16,15 L16,2.998 C16,2.4475 15.5525,2 15,2 L15,2 Z M12,11 L4,11 L4,10 L12,10 L12,11 L12,11 Z M12,9 L4,9 L4,8 L12,8 L12,9 L12,9 Z"
                                                          id="Shape"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Categorías
                        </li>
                        <li class="col-3" data-id="2">
                            <svg width="16px" height="15px" viewBox="0 0 16 15" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Paso-1" transform="translate(-555.000000, -138.000000)" fill="#D9D9D9">
                                        <g id="icons" transform="translate(315.000000, 138.000000)">
                                            <g id="noun_347582_cc" transform="translate(240.000000, 0.000000)">
                                                <g id="Group">
                                                    <g>
                                                        <path d="M2.93095248,6.74190512 L3.66927083,6.74190512 L4.68952397,6.74190512 L4.68952397,8.50047661 L3.71335565,8.50047661 L2.93095248,8.50047661 L2.93095248,6.74190512 Z"
                                                              id="Rectangle-path"></path>
                                                        <rect id="Rectangle-path" x="2.93095248" y="10.8452386"
                                                              width="1.75857149" height="1.75857149"></rect>
                                                        <rect id="Rectangle-path" x="2.93095248" y="1.58285722"
                                                              width="9.37904794" height="2.98857135"></rect>
                                                        <path d="M0,14.4761905 L15.2409529,14.4761905 L15.2409529,0 L0,0 L0,14.4761905 Z M5.27571447,13.1900006 L2.34476198,13.1900006 L2.34476198,10.2590481 L5.27571447,10.2590481 L5.27571447,13.1900006 L5.27571447,13.1900006 Z M2.34476198,9.08666711 L2.34476198,6.15571463 L5.27571447,6.15571463 L5.27571447,9.08666711 L2.34476198,9.08666711 Z M12.8961909,12.6038101 L6.44809546,12.6038101 L6.44809546,12.0176196 L12.8961909,12.0176196 L12.8961909,12.6038101 L12.8961909,12.6038101 Z M6.44809546,11.4314291 L6.44809546,10.8452386 L11.7238099,10.8452386 L11.7238099,11.4314291 L6.44809546,11.4314291 L6.44809546,11.4314291 Z M12.8961909,8.50047661 L6.44809546,8.50047661 L6.44809546,7.91428611 L12.8961909,7.91428611 L12.8961909,8.50047661 L12.8961909,8.50047661 Z M6.44809546,7.32809562 L6.44809546,6.74190512 L11.7238099,6.74190512 L11.7238099,7.32809562 L6.44809546,7.32809562 L6.44809546,7.32809562 Z M12.8961909,5.33333333 L2.34476198,5.33333333 L2.34476198,0.996666727 L12.8961909,0.996666727 L12.8961909,5.33333333 L12.8961909,5.33333333 Z"
                                                              id="Shape"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Producto
                        </li>
                        <li class="col-3" data-id="3">
                            <svg width="17px" height="16px" viewBox="0 0 17 16" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 3.5.2 (25235) - http://www.bohemiancoding.com/sketch -->
                                <title>noun_82811_cc</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Paso-1" transform="translate(-765.000000, -139.000000)" fill="#D9D9D9">
                                        <g id="icons" transform="translate(315.000000, 138.000000)">
                                            <g id="noun_82811_cc" transform="translate(450.000000, 1.000000)">
                                                <g id="Group">
                                                    <g id="Shape">
                                                        <path d="M1.58347502,6.8 L0.0308088933,12.5949708 C-0.0978087482,13.0767675 0.187945278,13.5725404 0.670497516,13.7024801 L3.64702326,14.4998717 L1.58347502,6.8 L1.58347502,6.8 Z"></path>
                                                        <path d="M3.4,8.5 L5.11452415,14.8991526 C5.24446386,15.3813271 5.73985897,15.6676477 6.22203348,15.5388412 L9.54777217,14.6472056 L3.4,8.5 L3.4,8.5 Z"></path>
                                                        <path d="M8.60068395,7.15539938 C8.54817924,7.06342171 8.4826428,6.97937641 8.40369687,6.90345234 L8.14325087,6.65226076 C8.06449381,6.57614783 7.97742666,6.51419983 7.882616,6.46603904 C7.78761648,6.41787825 7.6907283,6.38879291 7.59195146,6.37840529 C7.49336349,6.36820653 7.39383119,6.38086054 7.29392116,6.41712278 C7.19382226,6.45319616 7.10033367,6.51646622 7.01345538,6.60655523 C6.92412183,6.69891063 6.86406249,6.79523221 6.83271076,6.89551997 C6.80117016,6.99561887 6.79248234,7.09496231 6.80645841,7.19317255 C6.82043448,7.29157165 6.85310827,7.38732664 6.90485751,7.4804375 C6.95622902,7.57354836 7.02138774,7.65816026 7.10033367,7.7342732 L7.36077967,7.98546477 C7.43953673,8.06138884 7.52584842,8.12295911 7.61971474,8.16998671 C7.71358107,8.2170143 7.81046925,8.24515531 7.91000155,8.25440974 C8.00991158,8.26366417 8.11001048,8.25025469 8.21010938,8.21418131 C8.31001941,8.17791907 8.4046412,8.11370468 8.49378588,8.02134928 C8.58085304,7.93126028 8.63977918,7.83607189 8.67113091,7.73578412 C8.70267151,7.63549636 8.71192593,7.53690839 8.69908306,7.43964248 C8.68624018,7.3421877 8.65337752,7.24737705 8.60068395,7.15539938 L8.60068395,7.15539938 Z"></path>
                                                        <path d="M16.6864716,7.31779609 L9.36943097,0.000755463386 L4.18147503,0 C3.51553405,0 2.97518887,0.540156321 2.97518887,1.20628616 L2.975,6.39499756 L10.2922295,13.7122271 C10.6457864,14.0655951 11.2176721,14.0655951 11.571229,13.7122271 L16.6862827,8.59660674 C17.0398396,8.24286101 17.0398396,7.67116409 16.6864716,7.31779609 L16.6864716,7.31779609 Z M5.67238202,2.69794862 C5.31920289,3.05150548 4.74656164,3.05150548 4.39338251,2.69794862 C4.04058111,2.34476948 4.04020337,1.77269484 4.39338251,1.4195157 C4.74656164,1.0661477 5.31939175,1.0661477 5.67238202,1.41932684 C6.02575002,1.77212824 6.02575002,2.34458062 5.67238202,2.69794862 L5.67238202,2.69794862 Z M9.00661968,7.65246637 C8.94108323,7.8286782 8.83342969,7.99431355 8.68365908,8.14993901 C8.53143321,8.30764199 8.36806425,8.42303902 8.19336334,8.49594124 C8.01847357,8.56903232 7.84320606,8.60529457 7.66718309,8.60529457 C7.49116012,8.60529457 7.31948107,8.56903232 7.15214593,8.49688557 C6.98462192,8.42454995 6.83220718,8.32218466 6.69471285,8.1897897 L6.43426685,7.93859813 C6.29488385,7.80393678 6.18571939,7.65416616 6.10752893,7.48947514 C6.02933847,7.32478413 5.98552159,7.15480486 5.97683376,6.97859303 C5.96814594,6.80275893 5.99704241,6.62616936 6.06352319,6.4490132 C6.1303817,6.27185703 6.23841296,6.10546622 6.38837244,5.94984076 C6.54059832,5.79213778 6.70415614,5.67674075 6.87866818,5.60383853 C7.05336909,5.53093632 7.22825886,5.496185 7.40314864,5.49958459 C7.57803841,5.50298417 7.74933973,5.54094621 7.91686374,5.61309296 C8.08419888,5.68542858 8.23774681,5.78892706 8.37731867,5.92358841 L8.63757581,6.17477999 C8.77507015,6.30717495 8.88366801,6.45543463 8.96318053,6.61880359 C9.04250419,6.78236142 9.08575446,6.95139635 9.09349796,7.12628612 C9.10086373,7.30079816 9.07177839,7.47625454 9.00661968,7.65246637 L9.00661968,7.65246637 Z M10.5878045,10.396876 L9.05799119,4.28366627 L9.6236444,4.14390554 L11.1532689,10.2571153 L10.5878045,10.396876 L10.5878045,10.396876 Z M14.0931547,7.93179896 C14.0276182,8.10801079 13.9201535,8.27383501 13.7701941,8.4292716 C13.6179682,8.58697458 13.4545992,8.70237161 13.2797095,8.77527383 C13.1051974,8.84817604 12.929741,8.88481602 12.7539069,8.88462715 C12.5776951,8.88462715 12.4058272,8.84836491 12.238492,8.77602929 C12.0711569,8.70369367 11.917609,8.60038405 11.7778482,8.46534497 L11.5141915,8.21113154 C11.3766972,8.07854772 11.2682882,7.92953257 11.1887757,7.76370835 C11.109452,7.59807301 11.0660129,7.42771601 11.0582694,7.25282624 C11.0507147,7.07812533 11.0801778,6.90210236 11.1466586,6.72475733 C11.2133282,6.54760117 11.3215484,6.38121036 11.4715078,6.22577377 C11.6235448,6.06807078 11.7871027,5.95248489 11.9618036,5.87958267 C12.1365045,5.80668045 12.3113943,5.77079594 12.4860952,5.772118 C12.6609849,5.77344006 12.8328529,5.81064663 13.0013212,5.88392658 C13.1699784,5.95720653 13.3229597,6.06032728 13.4604541,6.19272224 L13.7241108,6.44693567 C13.8638715,6.58178589 13.9726582,6.73136764 14.0510376,6.89605865 C14.129228,7.06074967 14.1722894,7.23054007 14.1798441,7.40524098 C14.1875876,7.58031962 14.1586911,7.75558712 14.0931547,7.93179896 L14.0931547,7.93179896 Z"></path>
                                                        <path d="M13.6990057,7.15660143 C13.646501,7.06462376 13.5805868,6.98057846 13.5016409,6.90446553 L13.2379841,6.6502521 C13.1592271,6.57413916 13.0723488,6.51219116 12.9773493,6.46403037 C12.8823497,6.41605845 12.7860282,6.38735084 12.6883845,6.37790755 C12.5909297,6.36846425 12.491964,6.38206259 12.392054,6.41813597 C12.2919551,6.45420935 12.1984665,6.51747941 12.1115882,6.60756841 C12.0245211,6.69765742 11.9655949,6.79284581 11.9340543,6.89313357 C11.9028915,6.99323247 11.8930704,7.09257591 11.9047801,7.19078615 C11.9164898,7.28918525 11.9480304,7.38494024 11.9997796,7.4780511 C12.0509623,7.57135083 12.1163099,7.65577386 12.1952558,7.7318868 L12.4589125,7.98610023 C12.5378584,8.06221316 12.6245479,8.12416116 12.7195474,8.17232195 C12.8145469,8.22048274 12.9121905,8.24919035 13.0119117,8.25844478 C13.111444,8.26769921 13.2115429,8.25428973 13.3116418,8.21821635 C13.4117407,8.18195411 13.5061736,8.11773972 13.5955072,8.02519546 C13.6823855,7.93510645 13.7413116,7.83991806 13.7728522,7.73981916 C13.8042039,7.6395314 13.8130806,7.54037683 13.7992934,7.44216659 C13.7849396,7.34395635 13.7515104,7.24876796 13.6990057,7.15660143 L13.6990057,7.15660143 Z"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Oferta
                        </li>
                        <li class="col-3" data-id="4">
                            <svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 3.5.2 (25235) - http://www.bohemiancoding.com/sketch -->
                                <title>noun_157603_cc</title>
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Paso-1" transform="translate(-976.000000, -138.000000)" fill="#D9D9D9">
                                        <g id="icons" transform="translate(315.000000, 138.000000)">
                                            <g id="noun_157603_cc" transform="translate(661.000000, 0.000000)">
                                                <g id="Group">
                                                    <path d="M13.76,12.64 L12.64,12.64 L12.64,13.76 L12.64,14.88 L12.64,16 L16,12.64 L14.88,12.64 L13.76,12.64 Z"
                                                          id="Shape"></path>
                                                    <path d="M0,0 L0,16 L11.52,16 L11.52,14.88 L11.52,13.76 L11.52,12.64 L11.52,11.52 L12.64,11.52 L13.76,11.52 L14.88,11.52 L16,11.52 L16,0 L0,0 L0,0 Z M10.376,7.208 L9.58384,8 L8.792,8.792 L8,9.584 L7.208,10.37584 L6.41616,9.584 L5.62416,8.792 L4.83216,8 L5.624,7.208 L6.416,8 L7.20784,8.79184 L8,8 L8.792,7.208 L9.58384,6.416 L10.37584,5.62416 L11.16768,6.416 L10.376,7.208 L10.376,7.208 Z"
                                                          id="Shape"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            Aprobación
                        </li>
                    </ul>
                    <span class="Wizard-line"></span>
                </section>

                @include('back.partial.step1')
                @include('back.partial.step2')
                @include('back.partial.step3')
                @include('back.partial.step4')

                <input type="hidden" id="Location" name="location" value="">
                <input type="hidden" id="Description" name="description" value="">
                <input type="hidden" id="DescriptionOffer" name="offer_description" value="">
            </form>
            <form style="display:none" class="formProductPreview" action="{{route('productDetailPreview')}}"
                  method="post" target="_blank"></form>
        </article>
    </section>

    @if (session('messageSuccess'))
        <div class="MessagePlatform row middle center">
            <div class="MessagePlatform-content">
                <span class="MessagePlatform-close">X</span>
                <h2>!Tienes un nuevo mensaje!</h2>
                <p>Tu producto ya casi esta listo, uno de nuestros agentes comerciales esta revisando que los datos que
                    nos has suminstrado esten orden.</p>
                <p>Una vez tu producto este listo y publicado se te notificará en tú centro de notificaciones, además te
                    enviaremos un correo electrónico.</p>
                <p>Si por alguna razón tu producto no es publicado, se te notificará por los mismos medios las razones y
                    los pasos que debes serguir para mejorar la publicación de tu producto.</p>
                <p>Gracias por elegirnos.</p>
                <p class="MessagePlatform-last">Centro de notificaciones <span>Agrosellers</span></p>
            </div>
        </div>
        @endif
        @endsection
        @section('scripts')
                <!--<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>-->
        <script src="{{asset('js/maps.js')}}"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
                async defer></script>
        <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
        <script src="{{asset('js/products.js')}}"></script>
        <script src="{{asset('js/forms.js')}}"></script>
        <script src="{{asset('js/images.js')}}"></script>
        <script src="https://cdn.quilljs.com/1.0.0-rc.0/quill.js"></script>
        <script>
            var toolbarOptions = [
                ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
                ['blockquote', 'code-block'],

                [{'header': 1}, {'header': 2}],               // custom button values
                [{'list': 'ordered'}, {'list': 'bullet'}],
                [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
                [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
                [{'direction': 'rtl'}],                         // text direction

                [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
                [{'header': [1, 2, 3, 4, 5, 6, false]}],

                [{'color': []}, {'background': []}],          // dropdown with defaults from theme
                [{'font': []}],
                [{'align': []}],

                ['clean']                                         // remove formatting button
            ];
            var editor = new Quill('#editor', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow'
            });

            editor.on('text-change', function (delta, source) {
                $('#Description').val(editor.getText());
            });
            var editorOffer = new Quill('#editorOffer', {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions
                }
            });
            editorOffer.on('text-change', function (delta, source) {
                $('#DescriptionOffer').val(editorOffer.getText());
            });
        </script>
        <script>
            $('.productDetailAction').on('click', function () {
                var $form = $('.formProductPreview');
                $form.html('<input style="display:none" type="submit" class="productDetailSession">');

                var input = $('input[type="text"], input[type="hidden"], input[type="number"]'),
                        checkbox = $('input[type="checkbox"]'),
                        images = $('.result figure img'),
                        categories = $('#categoriesList').children(),
                        subcategories = $('#subcategoriesList').children();

                var searchData = function (object, attr, type, name) {
                    var elements = "";

                    for (var i = 0; i < object.length; i++) {
                        var flag = false,
                                item = object.eq(i),
                                idItem = item.attr('id'),
                                valueItem = item.attr(attr),
                                finalValue = "",
                                finalName = "";

                        if (!valueItem) valueItem = item.val();

                        if (type == 'select') {
                            if (item.hasClass('selected')) {
                                flag = true;
                                finalValue = valueItem;
                                finalName = name + '';
                            }
                        }
                        else if (type == 'image') {
                            if (valueItem) {
                                flag = true;
                                finalValue = valueItem;
                                finalName = name + i;
                            }
                        }

                        else if (type == 'checkbox') {
                            if (item.attr('checked') == 'checked') {
                                flag = true;
                                finalValue = valueItem;
                                finalName = idItem;
                            }
                        }

                        else if (type == 'text') {
                            if (valueItem && idItem) {
                                if (idItem == 'token')
                                    idItem = '_token';
                                flag = true;
                                finalValue = valueItem;
                                finalName = idItem;
                            }
                        }

                        if (flag)
                            elements += "<input type='text' value='" + finalValue + "' name='" + finalName + "'>";
                    }
                    return elements;
                };

                $form.append(searchData(subcategories, 'data-id', 'select', 'subcategoriesId'));
                $form.append(searchData(categories, 'data-id', 'select', 'categoriesId'));
                $form.append(searchData(images, 'src', 'image', 'image'));
                $form.append(searchData(input, 'value', 'text', 'auto'));
                $form.append(searchData(checkbox, 'value', 'checkbox', 'auto'));

                $('.productDetailSession').trigger('click');
            });
        </script>
        <script>
            $('#farm-all').on('change click', function () {
                var isChecked = $(this).is(':checked');
                $('[id*="farm"]').prop('checked', isChecked);
            });
        </script>
@endsection
@section('styles')
    <link href="{{ asset('css/jquery.datetimepicker.css') }}" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.0.0-rc.0/quill.snow.css" rel="stylesheet">
@endsection