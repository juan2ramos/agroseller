@extends('admin.layout')

@section('content')

    <div class="ContentInfo Products">
        <h2>Agregar nuevo productos</h2>
        <hr class="Logo-hr">
        <select name="" class="Product-select" data-token="{{ csrf_token() }}" data-route="{{route('subcategoriesQuery')}}"
                id="categories">
            <option value="">Selecciona una categoria</option>
            @foreach( $categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <select name="" class="Product-select" data-route="{{route('featuresQuery')}}" id="subcategories">
            <option value="">Selecciona una subcategoria</option>
        </select>
        <form id="Product-form" class="form-horizontal" role="form" method="POST" action="{{ route('newProduct') }}"
              enctype="multipart/form-data">


            <input type="hidden" name="_token" value="{{ csrf_token() }}">


            <input type="hidden" id="Location" name="location" value="{{ old('location') }}">


            <span class="Marker " id="addMaker">Agregar las locaciones del producto</span>
            <span class="Marker " id="removeMaker">Eliminar locación</span>

            <div id="map" class="Map-provider "></div>

            <select  class="presentation dataForm" name="presentation">
                <option value="">Selecione la presentación</option>
                <option value="Bolsa">Bolsa</option>
                <option value="Caja">Caja</option>
                <option value="Botella">Botella</option>
            </select>

            <input type="text" class="size dataForm" placeholder="Tamaño " name="size" value="{{ old('size') }}">
            <input type="text" class="weight dataForm" placeholder="Peso " name="weight" value="{{ old('weight') }}">
            <input type="text"  class="measure dataForm" placeholder="Medida " name="measure" value="{{ old('measure') }}">
            <input type="text" class="material dataForm"  placeholder="Material " name="material" value="{{ old('material') }}">
            <textarea name="description" class="description dataForm"  placeholder="Descripción" cols="30" rows="10"></textarea>

            <div  class="composition dataForm" >
                <label class="composition dataForm" for="composition">Composición , propiedades(Ficha tecnica) PDF</label>
                <input class="composition dataForm" id="composition" type="file" name="composition">
            </div>
            <textarea name="forms-employment"  class="forms-employment dataForm"  placeholder="Descripción de uso" cols="30" rows="10"></textarea>
            <input  type="text"  class="price dataForm"  placeholder="Precio " name="price" value="{{ old('price') }}">

            <input type="checkbox" class="taxes dataForm"  name="taxes[]" value="1"><span class="taxes dataForm">Iva 16%</span>
            <input type="checkbox"  class="taxes dataForm" name="taxes[]" value="1"><span class="taxes dataForm">Retefuente 2.5%</span>

            <input type="text"  class="available-quantity dataForm" placeholder="Cantidad disponible " name="available-quantity dataForm"
                   value="{{ old('available-quantity') }}">

            <div  class="image-scale dataForm dataForm" >
                <label class="image-scale dataForm" for="image-scale">Imagen del producto</label>
                <input class="image-scale dataForm" id="image-scale" type="file" name="image-scale">
            </div>
            <input  type="text" class="offer-price dataForm"   name="offer-price" placeholder="precio en oferta">
            <input type="text"  class="offer-on dataForm" class="datetimepicker_mask" name="offer-on" placeholder="Dia y hora de inicio de la oferta">
            <input type="text" class="offer-off dataForm"  class="datetimepicker_mask" name="offer-off" placeholder="Dia y hora de cierre de la oferta">


            <button class="Product-formButton dataForm"> Enviar</button>
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