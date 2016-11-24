@extends('layoutBack')
@section('content')
    <form id="Client-form" class="row center middle  Forms" role="form" method="POST" action="{{ route('clientInformationStore') }}">
        <div class="BackContainer FormAuth-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" id="Location" name="location" value="">
            <h2>COMPLETA TUS DATOS</h2>

            <button class="Marker Button" id="addMaker" onclick="return false">Agregar ubicacion</button>

            <div id="Map" class="Map"></div>

            <p>Selecciona tu actividad agrícola y/o pecuaría</p>

            <div class="row" style="margin:  2rem 0">
                @if(isset($farms))
                    @foreach($farms as $farm)
                        <label for="farmCategory-{{$farm->id}}" class="Forms-checkout capitalize col-12">
                            <input class="farm-all" type="checkbox" id="farmCategory-{{$farm->id}}" value="{{$farm->name}}" @if(old("farmCategory-{$farm->id}")) checked='checked' @endif >
                            <sub></sub>
                            {{$farm->name}}
                            <ul style="padding-left: 35px">
                                @foreach($farm->farms as $f)
                                    <label for="farm-{{$f->id}}" class="Forms-checkout capitalize col-12">
                                        <input class="farm-single" type="checkbox" name="farm-{{$f->id}}" id="farm-{{$f->id}}" value="{{$f->name}}" @if(old("farm-{$f->id}")) checked='checked'@endif >
                                        <sub></sub>
                                        {{$f->name}}
                                    </label>
                                @endforeach
                            </ul>
                        </label>
                    @endforeach
                @endif
            </div>

            <button type="submit" class="Button"> GUARDAR</button>
        </div>

    </form>
@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/maps.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>
    <script>
        $('.farm-all, .farm-single').on('click change', function(){
            var isChecked = $(this).is(':checked') ? 'checked' : false;
            $(this).attr('checked', isChecked).prop('checked', isChecked).siblings('ul').children('label').children('input').attr('checked', isChecked).prop('checked', isChecked);
        });
    </script>
@endsection