@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Usuarios</h2>
        <table class="AdminHome-table">
            <thead>
            <tr>

                <th>Nombre</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>

                <td> {{ $user->name }}</td>
                <td> {{ $roleName[$user->role_id ] }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('showUser',$user->id) }}" class="icon-binoculars"></a><a href="#" data-id="{{ $user->id }}"  class="CategoryDelete icon-remove"></a> </td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <form role="form" method="delete" id="FormDeleteCategory" action="{{ route('categoryDelete',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection