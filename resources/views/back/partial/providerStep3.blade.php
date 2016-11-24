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
<section class="Step Step-3 Forms">

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

        <label for="priceCurrent" >
            <input type="text" id="priceCurrent" name="price" @if(isset($productEdit)) value="{{$productEdit->price}}" @endif>
            <span>Precio</span>
            <em>$</em>
        </label>

        <label for="available_quantity">
            <input type="number" id="available_quantity" name="available_quantity" @if(isset($productEdit)) value="{{$productEdit->available_quantity}}" @endif>
            <span>Cantidad disponible</span>
            <em></em>
        </label>

        <label for="min_quantity">
            <input type="number" id="min_quantity" name="min_quantity" @if(isset($productEdit)) value="{{$productEdit->min_quantity}}" @endif>
            <span>Cantidad mínima para despacho</span>
            <em></em>
        </label>
        <div class="row">
            <label for="iva" class="col-6">
                <input type="checkbox" name="taxes[]" value="iva" id="iva" @if(isset($productEdit) && strpos($productEdit->taxes, 'iva') !== false) checked="checked" @endif >
                <sub></sub>
                Iva 16%
            </label>
            <label for="rete" class="col-6">
                <input type="checkbox" name="taxes[]" value="retefuente" id="rete" @if(isset($productEdit) && strpos($productEdit->taxes, 'rete') !== false) checked="checked" @endif>
                <sub></sub>
                Retefuente 2.5%
            </label>
        </div>
    </article>

    <div class="Button  Next" id="stepThreeButton">SIGUIENTE</div>
</section>