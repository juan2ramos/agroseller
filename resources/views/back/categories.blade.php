@extends('layoutBack')

@section('content')

    <div class="BackContainer">
        <h2>Categorías</h2>

        <p>Las imagenes no deben exceder los 2MB y una resolución mínima recomendad de 400X400</p>
        <table class="Table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> {{ $category->name }}</td>
                    <td> {{$category->created_at}}</td>
                    <td><a href="#" data-id="{{ $category->id }}" class="CategoryDelete icon-remove"></a></td>
                </tr>
                <tr class="SubTable">
                    <td>
                        <table class="Table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha de creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category->subcategories as $subcategories)
                                    <tr>
                                        <td>{{$subcategories->id}}</td>
                                        <td>{{$subcategories->name}}</td>
                                        <td>{{$subcategories->created_at}}</td>
                                        <td><a href="#">Actualizar</a><a href="#">Eliminar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
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

@section('scripts')
    <script src="{{asset('js/tables.js')}}"></script>
@endsection