<section class="Step Step-4">
    <div class="row">
        <div class="col-6">
            <a class="Button">PREVISUALIZACIÓN DEL PRODUCTO</a>
        </div>
        @if(isset($productEdit))
        <button class="Button Step-finish col-6">ACTUALIZAR PRODUCTO</button>
        @else
        <button class="Button Step-finish col-6">GUARDAR PRODUCTO</button>
        @endif
    </div>
    <section id="detailsProduct" class="row"></section>
</section>