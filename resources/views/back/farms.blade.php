@extends('layoutBack')
@section('content')
    <div class="BackContainer">
        <div class="tables">
            <h2>Listado de cultivos</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($farms as $farm)
                    <tr>
                        <td>{{$farm->id}}</td>
                        <td>{{$farm->name}}</td>
                        <td>{{$farm->description}}</td>
                        <td>
                            <a href="">Editar</a>
                            <a href="">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $farms->render() !!}
        </div>
    </div>
@endsection