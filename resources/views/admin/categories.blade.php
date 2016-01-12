@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Categorías</h2>

        <p>Las imagenes no deben exceder los 2MB y una resolución mínima recomendad de 400X400</p>
        <table class="AdminHome-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha de Creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> {{ $category->name }}
                        <br>
                        @foreach($category->subcategories as $subcategories)
                            {{$subcategories->name}} <br>
                        @endforeach
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{--<a href="" class="icon-binoculars"></a>--}}<a href="#" data-id="{{ $category->id }}"
                                                                          class="CategoryDelete icon-remove"></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form role="form" method="POST" class="ContentInfo-form" action="{{ route('category') }} "
              enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" placeholder="Nueva Categoría" name="nameCategory" value="{{ old('nameCategory') }}">
            <input type="file" name="categoryImage" value="">
            <button type="submit" class="">Añadir</button>
        </form>
        <br>

        <h2>Agregar Subcategorías</h2>

        <form role="form" method="POST" class="ContentInfo-form" action="{{ route('newSubcategory') }} "
              enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" placeholder="Nueva Subcategoría" name="subcategory" value="{{ old('subcategory') }}">
            <select name="category">
                <option value="">Selecciona una subcategoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="">Añadir</button>
        </form>
    </div>
    <form role="form" method="delete" id="FormDeleteCategory" action="{{ route('categoryDelete',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection