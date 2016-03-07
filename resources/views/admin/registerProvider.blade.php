@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Llena los datos de tu empresa</h2>
        @include('admin.partial.error')
        <form id="Provider-form" class="form-horizontal" role="form" method="POST" action="{{ route('registerProvider') }}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="Location" name="location" value="{{ old('location') }}">

            <hr class="Logo-hr">
            <span class="Marker" id="addMaker">Agregar locación</span>
            <span class="Marker" id="removeMaker">Eliminar locación</span>
            <div id="map" class="Map-provider"></div>
            <div>
                <label for="imageProvider">Imágen </label>
                <input type="file" name="imageProvider" >
            </div>

            <input type="text" class="form-control" placeholder="Dirección" name="address" value="{{ old('address') }}">
            <input type="text" class="form-control" placeholder="Nombre del contacto comercial" name="contact"
                   value="{{ old('contact') }}">
            <input type="text" class="form-control" placeholder="Teléfono del contacto comercial" name="contact-phone"
                   value="{{ old('contact') }}">
            <input type="text" class="form-control" placeholder="NIT" name="NIT" value="{{ old('NIT') }}">
            <input type="text" class="form-control" placeholder="Video Institucional" name="url-video"
                   value="{{ old('url-video') }}">
            <textarea name="description" id="description" cols="30" rows="10" placeholder="Descripción">{{ old('description') }}</textarea>
            @foreach( $categories as $category)
                <input type="checkbox" name="category[]" value="{{$category->id}}">{{$category->name}} <br>
            @endforeach
            <button> Enviar </button>
        </form>

    </div>

@endsection

@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap" async defer></script>
    <script src="{{asset('js/maps.js')}}"></script>
@endsection
