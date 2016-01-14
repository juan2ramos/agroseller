@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Agregar nuevo productos</h2>
        <hr class="Logo-hr">
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
        <form id="Product-form" class="form-horizontal" role="form" method="POST" action="{{ route('newProduct') }}"
              enctype="multipart/form-data">


            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <input type="hidden" id="Location" name="location" value="{{ old('location') }}">


            <span class="Marker" id="addMaker">Agregar las locaciones del producto</span>
            <span class="Marker" id="removeMaker">Eliminar locación</span>

            <div id="map" class="Map-provider"></div>

            <select name="presentation">
                <option value="">Selecione la presentación</option>
                <option value="Bolsa">Bolsa</option>
                <option value="Caja">Caja</option>
                <option value="Botella">Botella</option>
            </select>

            <input type="text" placeholder="Tamaño " name="size" value="{{ old('size') }}">
            <input type="text" placeholder="Peso " name="weight" value="{{ old('weight') }}">
            <input type="text" placeholder="Medida " name="measure" value="{{ old('measure') }}">
            <input type="text" placeholder="Material " name="material" value="{{ old('material') }}">
            <textarea name="description" placeholder="Descripción" cols="30" rows="10"></textarea>

            <div>
                <label for="composition">Composición , propiedades(Ficha tecnica) PDF</label>
                <input id="composition" type="file" name="composition">
            </div>
            <textarea name="forms-employment" placeholder="Descripción de uso" cols="30" rows="10"></textarea>
            <input type="text" placeholder="Precio " name="price" value="{{ old('price') }}">

            <input type="checkbox" name="taxes[]" value="1">Iva 16% <br>
            <input type="checkbox" name="taxes[]" value="1">Retefuente 2.5% <br>

            <input type="text" placeholder="Cantidad disponible " name="available-quantity"
                   value="{{ old('available-quantity') }}">

            <div>
                <label for="image-scale">Imagen del producto</label>
                <input id="image-scale" type="file" name="image-scale">
            </div>
            <input type="text"  name="offer-price" placeholder="precio en oferta">
            <input type="text" class="datetimepicker_mask" name="offer-on" placeholder="Dia y hora de inicio de la oferta">
            <input type="text" class="datetimepicker_mask" name="offer-off" placeholder="Dia y hora de cierre de la oferta">


            <button> Enviar</button>
        </form>
    </div>
@endsection
@section('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/maps.js')}}"></script>
    <script src="{{asset('js/jquery.datetimepicker.full.min.js')}}"></script>
    <script src="{{asset('js/products.js')}}"></script>
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.css') }}">
@endsection