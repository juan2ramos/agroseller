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

    <article class="Step-location">
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

        <p>2. Ingresa el nombre de tu producto
                    <span>Escribe el nombre del producto
                        con la especificación deseada.</span>
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
            <div class="ql-format-group">
                <span class="ql-format-button ql-bold"></span>
                <span class="ql-format-button ql-italic"></span>
                <span class="ql-format-button ql-strike"></span>
                <span class="ql-format-button ql-underline"></span>
                <span class="ql-format-separator"></span>
                <select class="ql-size">
                    <option value="10px">Small</option>
                    <option value="14px" selected>Normal</option>
                    <option value="18px">Large</option>
                </select>
                <select title="Font" class="ql-font">
                    <option value="sans-serif" selected="">Sans Serif</option>
                    <option value="serif">Serif</option>
                    <option value="monospace">Monospace</option>
                </select>
                <span class="ql-format-separator"></span>
                <select title="Text Color" class="ql-color">
                    <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected=""></option>
                    <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                    <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                    <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                    <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                    <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                    <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                    <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                    <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                    <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                    <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                    <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                    <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                    <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                    <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                    <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                    <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                    <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                    <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                    <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                    <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                    <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                    <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                    <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                    <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                    <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                    <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                    <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                    <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                    <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                    <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                    <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                    <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                    <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                    <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                </select>
                <select title="Background Color" class="ql-background">
                    <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option>
                    <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                    <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                    <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                    <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                    <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                    <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                    <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected=""></option>
                    <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                    <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                    <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                    <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                    <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                    <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                    <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                    <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                    <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                    <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                    <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                    <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                    <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                    <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                    <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                    <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                    <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                    <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                    <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                    <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                    <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                    <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                    <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                    <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                    <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                    <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                    <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                </select>
                <span class="ql-format-button ql-link"></span>
                <span class="ql-format-separator"></span>
                <span title="Bullet" class="ql-format-button ql-bullet"></span>
                <span class="ql-format-button ql-list"></span>
                <select title="Text Alignment" class="ql-align">
                    <option value="left" label="Left" selected=""></option>
                    <option value="center" label="Center"></option>
                    <option value="right" label="Right"></option>
                    <option value="justify" label="Justify"></option>
                </select>
            </div>

        </div>

        <div id="editor" ql-container></div>
    </article>
    <h4>DETALLES</h4>


    <select class="presentation DataForm" name="presentation">
        @if(isset($productEdit) && $productEdit->presentation)
        <option value="{{ $productEdit->presentation }}">{{  $productEdit->presentation }}</option>
        @else
        <option value="">Selecione la presentación</option>
        @endif
        <option value="Bolsa">Bolsa</option>
        <option value="Caja">Caja</option>
        <option value="Botella">Botella</option>
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

    <label for="priceCurrent" >
        @if(isset($productEdit))
        <input type="text" id="priceCurrent" name="price" value="{{ $productEdit->price }}">
        @else
        <input type="text" id="priceCurrent" name="price" value="{{ old('price') }}">
        @endif
        <span>Precio</span>
        <em>$</em>
    </label>

    <div class="row middle">
        <label for="iva" class="col-6">
            <input type="checkbox" name="taxes[]" value="iva" id="iva">
            <sub></sub>
            Iva 16%
        </label>
        <label for="rete" class="col-6">
            <input type="checkbox" name="taxes[]" value="retefuente" id="rete">
            <sub></sub>
            Retefuente 2.5%
        </label>
    </div>
    <label for="available_quantity">
        @if(isset($productEdit))
        <input type="number" id="available_quantity" name="available_quantity" value="{{ $productEdit->available_quantity }}">
        @else
        <input type="number" id="available_quantity" name="available_quantity" value="{{ old('available_quantity') }}">
        @endif
        <span>Cantidad disponible</span>
        <em></em>
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
            @foreach($productEdit->productFiles()->get() as $image)
                @if($image->extension != 'pdf')
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