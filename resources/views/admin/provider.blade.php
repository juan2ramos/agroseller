@extends('admin.layout')

@section('content')

    <div class="ContentInfo">
        <h2>Lista de proveedores</h2>

        <form action="{{ route($routeSearch) }}" method="post" class="Search">
            <input type="text" name="search" value="{{{ $search or '' }}}" placeholder="Buscar usuario">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="">
                @include('svg.search')
            </button>

        </form>
        <table class="AdminHome-table">
            <thead>
            <tr>

                <th>Nombre proveedor</th>
                <th>Email</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Aprovado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>

                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td>@if( $user->provider) {{$user->provider->contact}} @endif</td>
                    <td>@if( $user->provider) {{$user->provider['contact-phone']}} @endif</td>
                    <td>
                        @if( $user->provider)
                            <input data-id="{{$user->id}}" class="activeProvider" style="width: auto" type="checkbox"
                                   @if($user->validate) checked @endif >
                        @endif
                    </td>
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
    <form role="form" method="post" id="FormUpdateProvider" action="{{ route('updateProvider',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

@endsection
@section('scripts')
    <script src="{{asset('js/activeProvider.js')}}"></script>
@endsection