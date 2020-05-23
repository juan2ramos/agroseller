<section class="Step Step-3 Forms">
    <article>
        <p>Seleccionar cultivos
            <span>Seleccione los cultivos en los que su producto puede ser usado.</span>
        </p>
        <div class="row">
            @if(isset($productEdit))
                @foreach($farms as $farm)
                    <?php $flag = true; ?>
                    @foreach($farm->farms as $f)
                        @if(!(strpos($productEdit['farms'], $f->name) !== false))
                            <?php $flag = false; ?>
                            @break
                        @endif
                    @endforeach
                    <label for="farmCategory-{{$farm->id}}" class="Forms-checkout capitalize col-6">
                        <input class="farm-all" type="checkbox" id="farmCategory-{{$farm->id}}" value="{{$farm->name}}" @if($flag) checked='checked' @endif >
                        <sub></sub>
                        {{$farm->name}}
                        <ul style="padding-left: 35px">
                            @foreach($farm->farms as $f)
                                <label for="farm-{{$f->id}}" class="Forms-checkout capitalize col-6">
                                    <input class="farm-single" type="checkbox" name="farm-{{$f->id}}" id="farm-{{$f->id}}" value="{{$f->name}}" @if(strpos($productEdit['farms'], $f->name) !== false) checked='checked'@endif >
                                    <sub></sub>
                                    {{$f->name}}
                                </label>
                            @endforeach
                        </ul>
                    </label>
                @endforeach
            @else
                @if(isset($farms))
                    @foreach($farms as $farm)
                        <label for="farmCategory-{{$farm->id}}" class="Forms-checkout capitalize col-6">
                            <input class="farm-all" type="checkbox" id="farmCategory-{{$farm->id}}" value="{{$farm->name}}" @if(old("farmCategory-{$farm->id}")) checked='checked' @endif >
                            <sub></sub>
                            {{$farm->name}}
                            <ul style="padding-left: 35px; display: none">
                                @foreach($farm->farms as $f)
                                    <label for="farm-{{$f->id}}" class="Forms-checkout capitalize col-6">
                                        <input class="farm-single" type="checkbox" name="farm-{{$f->id}}" id="farm-{{$f->id}}" value="{{$f->name}}" @if(old("farm-{$f->id}")) checked='checked'@endif >
                                        <sub></sub>
                                        {{$f->name}}
                                    </label>
                                @endforeach
                            </ul>
                        </label>
                    @endforeach
                @endif
            @endif
        </div>
    </article>
    <div class="Button Next" id="stepThreeButton">SIGUIENTE</div>
</section>