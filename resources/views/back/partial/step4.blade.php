<section class="Step Step-4">
    <div class="row">
        @if(isset($productEdit))
        <button class="Button Step-finish small-12">ACTUALIZAR PRODUCTO</button>
        @else
        <button class="Button Step-finish small-12">GUARDAR PRODUCTO</button>
        @endif
    </div>
    <div class="row">
        <div class="productDetailAction Button small-12">PREVISUALIZAR PRODUCTO</div>
    </div>
</section>