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
<section class="Step Step-2 Forms">

    <article class="row">
        <span class="smaller-12">1. Seleccione o cree la marca del producto.</span>
        <select name="brand" id="brand" class="smaller-9">
            <option value=""></option>
            @if(isset($productEdit))
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}" @if($productEdit->brand_id == $brand->id) selected @endif >{{$brand->name}}</option>
                @endforeach
            @else
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}" >{{$brand->name}}</option>
                @endforeach
            @endif
        </select>
        <div class="smaller-3 row middle end">
            <div class="Button" id="createBrand">CREAR MARCA</div>
        </div>
    </article>

    <article>

        <p>2. Ingresa el nombre de tu producto
            <span>Escribe el nombre del producto con la especificación deseada.</span>
        </p>
        <label for="nameProduct">
            @if(isset($productEdit))
            <input type="text" id="nameProduct" name="name" value="{{ $productEdit->name }}">
            @else
            <input type="text" id="nameProduct" name="name" value="{{ old('name') }}">
            @endif
            <span>Nombre del producto</span>
        </label>
    </article>
    <article>
        <p>3. Información del producto</p>

        <div id="toolbar" class="border--top">
                {{ old('description') }}
        </div>

        <div id="editor" ql-container></div>
    </article>
    <h4>DETALLES</h4>


    <select class="presentation DataForm" name="presentation">
        <option value="">Selecione la presentación</option>
        <option value="Bolsa" {{(isset($productEdit) && $productEdit->presentation == 'Bolsa')?'selected':''}}>Bolsa</option>
        <option value="Bulto" {{(isset($productEdit) && $productEdit->presentation == 'Bulto')?'selected':''}}>Bulto</option>
        <option value="envase-plastico" {{(isset($productEdit) && $productEdit->presentation == 'envase-plastico')?'selected':''}}>Envase lastico</option>
        <option value="envase-vidrio" {{(isset($productEdit) && $productEdit->presentation == 'envase-vidrio')?'selected':''}}>Envase Vidrio</option>
        <option value="Caja" {{(isset($productEdit) && $productEdit->presentation == 'Caja')?'selected':''}}>Caja</option>
        <option value="sobre" {{(isset($productEdit) && $productEdit->presentation == 'sobre')?'selected':''}}>Sobre</option>


    </select>
        <!--
    <label for="size" class="DataForm size" >
        if(isset($productEdit))
        <input type="number" id="size" name="size" value="{ $productEdit->size }}">
        else
        <input type="number" id="size" name="size" value="{ old('size') }}">
        endif
        <span>Tamaño del producto</span>
        <em>Kg</em>
    </label>-->
    <label for="weight" class="DataForm weight">
        @if(isset($productEdit))
        <input type="text" id="weight" name="weight" value="{{ $productEdit->weight }}">
        @else
        <input type="text" id="weight" name="weight" value="{{ old('weight') }}">
        @endif
        <span>Peso del producto</span>
    </label>
    <label for="measure"   class="DataForm measure">
        @if(isset($productEdit))
            <input type="text" id="measure" name="measure" value="{{ $productEdit->measure }}">
        @else
            <input type="text" id="measure" name="measure" value="{{ old('measure') }}">
        @endif
        <span>Medida</span>

    </label>
    <label for="composition" class="DataForm composition">
        <input type="file" id="composition" name="composition" placeholder="sds">
        <div class="file" id="compositionText">Composición , propiedades(Ficha tecnica)</div>
        <em>PDF</em>
    </label>
    <label for="canServientrega" class="col-12 col-sm-12" style=" margin: 40px 0 32px;">
        @if(isset($productEdit))
            <input type="checkbox" name="canServientrega" id="canServientrega"  @if( $productEdit->canServientrega ) checked="checked" @endif value="{{$productEdit->canServientrega}}">
        @else
            <input type="checkbox" name="canServientrega" id="canServientrega" value="1">
        @endif

        <sub></sub>
        Este producto cumple con las especiicaciones para ser enviado por servientrega
    </label>


    <!-- <label for="priceCurrent" >
        @if(isset($productEdit))
        <input type="text" id="priceCurrent" name="price" value="{{ $productEdit->price }}">
        @else
        <input type="text" id="priceCurrent" name="price" value="{{ old('price') }}">
        @endif
        <span>Precio</span>
        <em>$</em>
    </label> -->

    <div class="row middle">
        <!--<label for="iva" class="col-6">
            <input type="checkbox" name="taxes[]" value="iva" id="iva">
            <sub></sub>
            Iva 16%
        </label>
        <label for="rete" class="col-6">
            <input type="checkbox" name="taxes[]" value="retefuente" id="rete">
            <sub></sub>
            Retefuente 2.5%
        </label>-->
    </div>
    <label for="available_quantity">
    <!--    @if(isset($productEdit))
        <input type="number" id="available_quantity" name="available_quantity" value="{{ $productEdit->available_quantity }}">
        @else
        <input type="number" id="available_quantity" name="available_quantity" value="{{ old('available_quantity') }}">
        @endif
        <span>Cantidad disponible</span>
        <em></em>-->
    </label>

    <h4>IMAGENES
        <ul>
            <li><span>Dimensión 640 x 640.</span></li>
            <li><span>Fondo blanco.</span></li>
            <li><span>Peso máximo 2 MB.</span></li>
            <li><span>Para cargar una imagen haz clic sobre el recuadro y busca la ubicación de tu imagen o solo arrástrala hasta el recuadro.</span></li>
        </ul>
    </h4>

    <div class="row Step-2Images">
        @if(isset($productEdit))
            <?php $i = 1 ?>
            @foreach($productEdit->productFiles as $image)
                @if($image->extension != 'pdf')
                    <div class="image col-3">
                        <label for="image{{$i}}">
                            <input type="file" class="StepImages" name="image{{$i}}" id="image{{$i}}">
                            <figure class=" row middle center">
                                <svg width="81px" height="47px">
                                    <use xlink:href="#imageTemp"></use>
                                </svg>
                            </figure>
                            <output class="result">
                                <figure>
                                    <img class="thumbnail" src="{{asset('uploads/products/' . $image->name)}}" title="">
                                </figure>
                            </output>
                        </label>
                    </div>
                    <?php $i++ ?>
                @endif
            @endforeach
            @for(; $i <= 4; $i++)
                <div class="image col-3">
                    <label for="image{{$i}}">
                        <input type="file" class="StepImages" name="image{{$i}}" id="image{{$i}}">
                        <figure class=" row middle center">
                            <svg width="81px" height="47px">
                                <use xlink:href="#imageTemp"></use>
                            </svg>
                        </figure>
                        <output class="result" />
                    </label>
                </div>
            @endfor

        @else
            <label for="image1" class="col-3 ">
                <input type="file" class="StepImages" name="image1" id="image1">
                <figure class=" row middle center">
                    <svg width="81px" height="47px">
                        <use xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result" />
            </label>
            <label for="image2"  class="col-3 ">
                <input type="file"  class="StepImages" name="image2" id="image2">
                <figure class=" row middle center">
                    <svg width="81px" height="47px">
                        <use xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result" />
            </label>
            <label for="image3" class="col-3 ">
                <input type="file"  class="StepImages" name="image3" id="image3">
                <figure class=" row middle center">
                    <svg width="81px" height="47px">
                        <use xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result" />
            </label>
            <label for="image4" class="col-3 ">
                <input type="file" class="StepImages"  name="image4" id="image4">
                <figure class=" row middle center">
                    <svg width="81px" height="47px">
                        <use xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result" />
            </label>
        @endif

    </div>
    <div class="Button  Next" id="stepTwoButton">SIGUIENTE</div>
</section>