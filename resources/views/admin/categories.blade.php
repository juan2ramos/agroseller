@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Categorías</h2>
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
                <td> {{ $category->name }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{--<a href="" class="icon-binoculars"></a>--}}<a href="#" data-id="{{ $category->id }}"  class="CategoryDelete icon-remove"></a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <form role="form" method="POST" class="ContentInfo-form" action="{{ route('category') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" placeholder="Nueva Categoría" name="nameCategory" value="{{ old('email') }}">
            <button type="submit" class="">Añadir</button>

        </form>
    </div>
    <form role="form" method="delete" id="FormDeleteCategory" action="{{ route('categoryDelete',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection