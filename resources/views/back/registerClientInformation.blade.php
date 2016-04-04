@extends('layoutBack')
@section('content')
    <form id="Client-form" class="row center middle FormAuth Forms" role="form" method="POST" action="{{ route('register') }}">
        <div class="BackContainer FormAuth-container">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <input type="hidden" id="Location" name="location" value="">
            <h2>COMPLETA TUS DATOS</h2>

            <p class="Marker " id="addMaker">Agregar ubicacion</p>

            <div id="map" class="Map-provider "></div>

            <p>Selecciona tus cultivos</p>

            <div class="row">
            @foreach($farms as $farm)
                <label for="farm-{{$farm->id}}" class="Forms-checkout capitalize col-6">
                    <input type="checkbox" name="farm" id="farm-{{$farm->id}}">
                    <sub></sub>
                    {{$farm->name}}
                </label>
            @endforeach
            </div>

            <button type="submit" class="Button"> GUARDAR</button>
        </div>

    </form>
@endsection
<!---->

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/maps.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endsection