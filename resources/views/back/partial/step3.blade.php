<section class="Step Step-3 Forms">
    <article>
        <p>Seleccionar cultivos
            <span>Seleccione los cultivos en los que su producto puede ser usado.</span>
        </p>
        <div class="row">
            @if(isset($productEdit))
                <label for="farm-all" class="Forms-checkout capitalize col-6">
                    <input type="checkbox" id="farm-all" value="">
                    <sub></sub>
                    Todos
                </label>
                <?php $farmsProduct = explode(',' , $productEdit['farms']); ?>
                @foreach($farms as $farm)
                    <label for="farm-{{$farm->id}}" class="Forms-checkout capitalize col-6">
                        <input type="checkbox" name="farm-{{$farm->id}}" id="farm-{{$farm->id}}" value="{{$farm->name}}" @if(in_array($farm->name, $farmsProduct, false))checked='checked'@endif >
                        <sub></sub>
                        {{$farm->name}}
                    </label>
                @endforeach
            @else
                @if(isset($farms))
                    <label for="farm-all" class="Forms-checkout capitalize col-6">
                        <input type="checkbox" id="farm-all" value="">
                        <sub></sub>
                        Todos
                    </label>
                    @foreach($farms as $farm)
                        <label for="farm-{{$farm->id}}" class="Forms-checkout capitalize col-6">
                            <input type="checkbox" name="farm-{{$farm->id}}" id="farm-{{$farm->id}}" value="{{$farm->name}}">
                            <sub></sub>
                            {{$farm->name}}
                        </label>
                    @endforeach
                @endif
            @endif
        </div>
    </article>
    <div class="Button Next" id="stepThreeButton">SIGUIENTE</div>
</section>