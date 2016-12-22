@extends('layoutBack')
@section('content')
    <input type="hidden" id="callProducts" value="{{route('callProducts')}}">
    <input id="productAdminId" type="hidden" value="{{$productEdit->product_id}}">
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
    <section class="BackContainer row" style="position: relative">
        <section class="Step Step-3 editProductProvider  Forms">
            <form id="Product-form" role="form" method="POST"
                  action="{{ route('updateProductProvider', [$productEdit->id]) }}" enctype="multipart/form-data">
                <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="deleteImages" name="deleteImages" value="">
                <article class="Step-location">
                    <h2 class="editProductProvider-h2">{{$productEdit->product->name}}</h2>
                    <p>1. Añadir los lugares donde está ubicado tu producto
                        <span>Navega por el mapa y ubica el lugar que
                        deseas añadir, da un clic sobre el botón
                        “AÑADE UNA UBICACIÓN”, después de que el
                        marcador esta sobre el mapa puedes desplazarlo
                        a una ubicación más exacta; si deseas eliminar
                        da doble clic sobre el marcador, si deseas
                        eliminar todas tus ubicaciones para empezar
                        de nuevo oprime “ELIMINAR TODAS LAS UBICACIONES".
                    </span>
                    </p>
                    <span class="Marker Button" id="addMaker">AÑADE UNA UBICACIÓN</span>
                    <span class="Marker Button" id="removeMaker">ELIMINAR TODAS LAS UBICACIONES</span>
                    @if(isset($productEdit))
                        <div id="Map" class="Map Editable"></div>
                    @else
                        <div id="Map" class="Map"></div>
                    @endif
                </article>

                <article>

                    <label for="priceCurrent">
                        <input type="text" id="priceCurrent" name="price"
                               @if(isset($productEdit)) value="{{$productEdit->price}}" @endif>
                        <span>Precio</span>
                        <em>$</em>
                    </label>

                    <label for="available_quantity">
                        <input type="number" id="available_quantity" name="available_quantity"
                               @if(isset($productEdit)) value="{{$productEdit->available_quantity}}" @endif>
                        <span>Cantidad disponible</span>
                        <em></em>
                    </label>

                    <label for="min_quantity">
                        <input type="number" id="min_quantity" name="min_quantity"
                               @if(isset($productEdit)) value="{{$productEdit->min_quantity}}" @endif>
                        <span>Cantidad mínima para despacho</span>
                        <em></em>
                    </label>


                    <label for="youtube">
                        <input type="text" id="youtube" name="youtube"
                               @if(isset($productEdit)) value="{{$productEdit->youtube}}" @endif>
                        <span>URL Video (id de Youtube)</span>
                        <em></em>
                    </label>

                    <label for="link">
                        <input type="text" id="link" name="link"
                               @if(isset($productEdit)) value="{{$productEdit->link}}" @endif>
                        <span>Link de página del producto</span>
                        <em></em>
                    </label>
                    @if(!isset($productEdit->canServientrega))
                        <label for="isServientrega" style="margin: 40px 0 32px;" class="col-12">
                            <input type="checkbox" name="isServientrega" value="1" id="isServientrega"
                                   @if(isset($productEdit->isServientrega)) checked="checked" @endif >
                            <sub></sub>
                            Desea que este producto sea enviado por servientrega
                        </label>
                    @endif
                    <div class="row">
                        <label for="iva" class="col-6">
                            <input type="checkbox" name="taxes[]" value="iva" id="iva"
                                   @if(isset($productEdit) && strpos($productEdit->taxes, 'iva') !== false) checked="checked" @endif >
                            <sub></sub>
                            Iva 16%
                        </label>
                        <label for="rete" class="col-6">
                            <input type="checkbox" name="taxes[]" value="retefuente" id="rete"
                                   @if(isset($productEdit) && strpos($productEdit->taxes, 'rete') !== false) checked="checked" @endif>
                            <sub></sub>
                            Retefuente 2.5%
                        </label>
                    </div>
                    <h2 style="margin: 36px 0 0;">
                        <label for="has_offer" class="col-6" style="display: inline-block">
                            <input type="checkbox" name="has_offer"
                                   @if(isset($productEdit) && $productEdit->has_offer) checked="checked"
                                   @endif id="has_offer"
                                   value="1">
                            <sub></sub>
                            Producto con oferta
                        </label>

                    </h2>

                    <div id="NewProduct-offer" @if(!isset($productEdit)) style="display: none"
                         @else @if(!$productEdit->has_offer) style="display: none" @endif  @endif >
                        <label for="offer_on">
                            <input type="text" id="offer_on" @if(isset($offer)) value="{{$offer->offer_on}}"
                                   @endif name="offer_on"
                                   class="datepicker">
                            <span>Fecha inicial de la oferta</span>
                            <em></em>
                        </label>
                        <label for="offer_off">
                            <input type="text" id="offer_off" @if(isset($offer)) value="{{$offer->offer_off}}"
                                   @endif  name="offer_off" class="datepicker">
                            <span>Fecha final de la oferta </span>
                            <em></em>
                        </label>
                        <label for="offer_price">
                            <input type="number" @if(isset($offer)) value="{{$offer->offer_price}}"
                                   @endif id="offer_price"
                                   name="offer_price">
                            <span>Valor de la oferta</span>
                            <em></em>
                        </label>
                    </div>


                    <h2 style="margin: 36px 0 0;"> Embalaje </h2>
                    <div class="Packing ">
                        @php $i = 1 @endphp
                        @foreach($productEdit->packing as $packing)

                            <div class="row Packing-item">
                                <div class="col-3 Field">
                                    <label for="high">
                                        <input type="number"  value="{{$packing->high}}" min="1"
                                               id="high"
                                               name="packing[packing{{$i}}][high]">
                                        <span>Alto</span>
                                        <em></em>
                                    </label>
                                </div>
                                <div class="col-3 Field">
                                    <label for="width">
                                        <input type="number" value="{{$packing->width}}"
                                              min="1"
                                               id="width"
                                               name="packing[packing{{$i}}][width]">
                                        <span>Ancho</span>
                                        <em></em>
                                    </label>
                                </div>
                                <div class="col-3 Field">
                                    <label for="long">
                                        <input type="number" value="{{$packing->long}}"
                                               min="1"
                                               id="long"
                                               name="packing[packing{{$i}}][long]">
                                        <span>Largo</span>
                                        <em></em>
                                    </label>
                                </div>
                                <div class="col-3 Field">
                                    <label for="quantity">
                                        <input type="number" value="{{$packing->quantity}}"
                                                min="1"
                                               id="quantity"
                                               name="packing[packing{{$i}}][quantity]">
                                        <span>Cantidad</span>
                                        <em></em>
                                    </label>
                                </div>
                            </div>
                            @php $i++ @endphp
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="row middle col-3" id="addPacking" style="cursor: pointer">

                            <svg width="30px" height="30px" viewBox="435 593 30 30" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                   transform="translate(435.000000, 593.000000)">
                                    <path d="M15,0 C6.75,0 0,6.75 0,15 C0,23.25 6.75,30 15,30 C23.25,30 30,23.25 30,15 C30,6.75 23.25,0 15,0 Z"
                                          id="Shape" fill="#C5D257"></path>
                                    <path d="M19.875,16.3125 L16.3125,16.3125 L16.3125,19.875 C16.3125,20.625 15.75,21.1875 15,21.1875 C14.25,21.1875 13.6875,20.625 13.6875,19.875 L13.6875,16.3125 L10.125,16.3125 C9.375,16.3125 8.8125,15.75 8.8125,15 C8.8125,14.25 9.375,13.6875 10.125,13.6875 L13.6875,13.6875 L13.6875,10.125 C13.6875,9.375 14.25,8.8125 15,8.8125 C15.75,8.8125 16.3125,9.375 16.3125,10.125 L16.3125,13.6875 L19.875,13.6875 C20.625,13.6875 21.1875,14.25 21.1875,15 C21.1875,15.75 20.625,16.3125 19.875,16.3125 Z"
                                          id="Path" fill="#253A1B"></path>
                                </g>
                            </svg>
                            <p style="margin: 0 5px; color: #253a1b;">Añadir embalaje</p>
                        </div>
                        <div class="row middle col-3" id="deletePacking" style="cursor: pointer">
                            <svg width="30px" height="30px" viewBox="404 205 30 30" version="1.1"
                                 xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Group" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                   transform="translate(404.000000, 205.000000)">
                                    <path d="M15,0 C6.75,0 0,6.75 0,15 C0,23.25 6.75,30 15,30 C23.25,30 30,23.25 30,15 C30,6.75 23.25,0 15,0 Z"
                                          id="Shape" fill="#C5D257"></path>
                                    <path d="M10,15 L20,15" id="Line" stroke="#253A1B" stroke-width="3"
                                          stroke-linecap="square"></path>
                                </g>
                            </svg>
                            <p style="margin: 0 5px; color: #253a1b;">Eliminar embalaje</p>
                        </div>
                    </div>

                </article>

                <input type="hidden" id="Location" name="location" value="">
                <input type="hidden" id="Description" name="description" value="">
                <div class="row">
                    @if(isset($productEdit))
                        <button class="Button Step-finish col-12">ACTUALIZAR PRODUCTO</button>
                    @else
                        <button class="Button Step-finish col-12">GUARDAR PRODUCTO</button>
                    @endif
                </div>
            </form>
        </section>
    </section>


    @if (session('messageSuccess'))
        <div class="MessagePlatform row middle center">
            <div class="MessagePlatform-content">
                <span class="MessagePlatform-close">X</span>
                <h2>!El archivo se ha editado correctamente!</h2>
                <p class="MessagePlatform-last">Centro de notificaciones <span>Agrosellers</span></p>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
    <!--<script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/1.4.5/numeral.min.js"></script>-->
    <script src="{{asset('js/maps.js')}}"></script>
    <script>getPosition('{!!$productEdit->location!!}')</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('js/products.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>
    <script src="{{asset('js/images.js')}}"></script>
    <script src="https://cdn.quilljs.com/1.0.0-rc.0/quill.js"></script>
    <script src="{{asset('js/selectproducts.js')}}"></script>
    <script>
        $(".datepicker").datetimepicker();
        var subcategories = $('#subcategoriesList'),
            productTable = $('#productTable');

        subcategories.on('click', 'li', function () {
            var params = {
                subcategory_id: $(this).data('id'),
                _token: $('#token').val()
            };

            $.post($('#callProducts').val(), params, function (data) {
                var products = data.products,
                    checked = "",
                    flag = false,
                    html = "";

                $.each(products, function (i, product) {
                    checked = product.id == $('#productAdminId').val() ? "checked='checked'" : "";
                    if (checked != '') flag = true;

                    console.log(checked + ' - ' + $('#productAdminId').val());
                    html += "<tr>" +
                        "<td>" + product.name + "</td>" +
                        "<td><input style='opacity:1' value='" + product.id + "' name='product_id' type='radio' class='productSelected' " + checked + " ></td>" +
                        "</tr>";
                });

                productTable.html(html);
                if (!flag) $('.productSelected').eq(0).attr('checked', 'checked');
            }, 'json');
        });


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
            var contents = $("#editor .ql-editor").html();
            $('#Description').val(contents);
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
        var productDescription = $('#ps-description').val(),
            productOfferDescription = $('#ps-offerDescription').val(),
            productTaxes = $('#ps-taxes').val().split(';'),
            productComposition = $('#ps-composition').val(),
            qlEditor = $('.ql-editor');

        if (productComposition)
            $('#composition').siblings('.file').text(productComposition.split('**')[1]);
        qlEditor.eq(0).html(productDescription);
        qlEditor.eq(1).html(productOfferDescription);

        if ($.inArray('iva', productTaxes) >= 0) $('#iva').attr('checked', true);
        if ($.inArray('retefuente', productTaxes) >= 0) $('#rete').attr('checked', true);
        if ($('#ps-importantOffer').val() == 1) $('#important_offer').attr('checked', true);

        for (var i = 0; i < $('.ps-images').length; i++) {
            var image = $('.ps-images').eq(i).val();
            $('.StepImages')
                .eq(i)
                .siblings('.result')
                .append('<figure><img src="/uploads/products/' + image + '"></figure>')
                .parent().prepend('<input class="imageName" type="hidden" value="' + image + '">')
                .parent().prepend('<div class="delete">x</div>');
        }

        var imagesList = "";

        $('.StepImages').on('change', function () {
            imagesList += $(this).siblings('.imageName').val() + ";";
            $('#deleteImages').val(imagesList);
        });

        $('.delete').on('click', function () {
            imagesList += $(this).siblings('label').children('.imageName').val() + ";";
            $('#deleteImages').val(imagesList);
            $(this).siblings('label').children('.result').html('');
            $(this).remove();
        });

        $('.MessagePlatform-close').on('click', function () {
            window.location.replace("/admin/productos");
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
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
    <link href="https://cdn.quilljs.com/1.0.0-rc.0/quill.snow.css" rel="stylesheet">
@endsection