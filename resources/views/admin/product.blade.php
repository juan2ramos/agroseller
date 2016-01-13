@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Agregar nuevo productos</h2>
        <hr class="Logo-hr">
        <form id="Product-form" class="form-horizontal" role="form" method="POST" action="{{ route('newProduct') }}"
              enctype="multipart/form-data">

            <select name="" data-token="{{ csrf_token() }}" data-route="{{route('subcategoriesQuery')}}"
                    id="categories">
                <option value="">Selecciona una categoria</option>
                @foreach( $categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <select name="" data-route="{{route('featuresQuery')}}" id="subcategories">
                <option value="">Selecciona una subcategoria</option>
            </select>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <input type="hidden" id="Location" name="location" value="{{ old('location') }}">


            <span class="Marker" id="addMaker">Agregar las locaciones del producto</span>
            <span class="Marker" id="removeMaker">Eliminar locación</span>

            <div id="map" class="Map-provider"></div>
            <div>
                <input type="file" name="imageProduct">
            </div>
            <select name="presentation" >
                <option value="">Selecione la presentación</option>
                <option value="Bolsa">Bolsa</option>
                <option value="Caja">Caja</option>
                <option value="Botella">Botella</option>
            </select>

            <input type="text"  placeholder="Tamaño " name="size" value="{{ old('size') }}">
            <input type="text"  placeholder="Peso " name="weight" value="{{ old('weight') }}">
            <input type="text"  placeholder="Medida " name="measure" value="{{ old('measure') }}">
            <input type="text"  placeholder="Material " name="material" value="{{ old('material') }}">


            <input type="text" class="form-control" placeholder="Nombre del contacto comercial" name="contact"
                   value="{{ old('contact') }}">
            <input type="text" class="form-control" placeholder="Teléfono del contacto comercial" name="contact-phone"
                   value="{{ old('contact') }}">
            <input type="text" class="form-control" placeholder="NIT" name="NIT" value="{{ old('NIT') }}">
            <input type="text" class="form-control" placeholder="Video Institucional" name="url-video"
                   value="{{ old('url-video') }}">
            <textarea name="description" id="description" cols="30" rows="10"
                      placeholder="Descripción">{{ old('description') }}</textarea>

            <button> Enviar</button>
        </form>

        @endsection
        @section('scripts')
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
                    async defer></script>
            <script src="{{asset('js/maps.js')}}"></script>
            <script src="{{asset('js/products.js')}}"></script>
@endsection