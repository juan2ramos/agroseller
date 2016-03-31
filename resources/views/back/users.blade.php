@extends('layoutBack')

@section('content')

    <div class="ContentInfo">
        <h2>Usuarios</h2>

        <form action="{{ route($routeSearch) }}" method="post" class="Search">
            <input type="text" name="search"  value="{{{ $search or '' }}}" placeholder="Buscar usuario">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="">
                @include('svg.search')
            </button>

        </form>
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
                    <td>
                        <a href="{{ route('showUser',$user->id) }}" class="icon-binoculars"></a>
                        <a href="#" data-id="{{ $user->id }}" class="CategoryDelete icon-remove"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->render() !!}
    </div>
    <form role="form" method="delete" id="FormDeleteCategory" action="{{ route('categoryDelete',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection