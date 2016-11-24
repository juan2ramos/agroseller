@extends('layoutBack')

@section('content')

    <h2>Cultivos</h2>
    <table class="Table BackContainer capitalize">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha de creación</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($farmCategories as $farmCategory)
            <tr>
                <td> {{ $farmCategory->id }}</td>
                <td> {{ $farmCategory->name }}</td>
                <td> {{$farmCategory->created_at}}</td>
                <td>
                    <a href="#" data-id="{{ $farmCategory->id }}" class="CategoryDelete icon-remove"></a>
                </td>
            </tr>
            <tr class="SubTable">
                <td colspan="5">
                    <table class="Table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($farmCategory->farms as $farm)
                            <tr>
                                <td>{{$farm->id}}</td>
                                <td>{{$farm->name}}</td>
                                <!--<td>
                                    <a href="#">Actualizar</a>
                                    <a href="#">Eliminar</a>
                                </td>-->
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <section class="row col-12 between">
        <form role="form" method="POST" class="Form col-5 row" action="{{ route('farmCategories.create') }} " enctype="multipart/form-data">
            <h2>Agregar categorías de cultivos</h2>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input style="padding: 10px; margin: 20px 0" class="smaller-12" type="text" placeholder="Nueva Categoría de cultivos" name="farmCategory" value="{{ old('farmCategory') }}">
            <div class="smaller-12 row middle center">
                <button class="Button col-5" type="submit">ANADIR</button>
            </div>
        </form>
        <form role="form" method="POST" class="row Form col-5" action="{{ route('farms.create') }} " enctype="multipart/form-data">
            <h2 class="col-12">Agregar Cultivos</h2>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="smaller-12 row middle" style="margin-top: 20px">
                <select style="padding: 10px; background: #fff" class="smaller-12" name="farmCategory">
                    @foreach($farmCategories as $farmCategory)
                        <option value="{{ $farmCategory->id }}">{{ $farmCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <input style="padding: 10px; margin: 20px 0" class="smaller-12" type="text" placeholder="Nuevo Cultivo" name="farm" value="{{ old('farm') }}">
            <div class="smaller-12 row middle center">
                <button class="Button col-5" type="submit">ANADIR</button>
            </div>
        </form>
    </section>
    <section class="row col-5">

    </section>

    <form role="form" method="delete" id="FormDeleteCategory" action="{{ route('categoryDelete',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection

@section('scripts')
    <script src="{{asset('js/tables.js')}}"></script>
@endsection