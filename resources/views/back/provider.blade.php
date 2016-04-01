@extends('layoutBack')

@section('content')

    <svg style="display: none" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
         xml:space="preserve">
         <g>
             <g id="search">
                 <path d="M318.75,280.5h-20.4l-7.649-7.65c25.5-28.05,40.8-66.3,40.8-107.1C331.5,73.95,257.55,0,165.75,0S0,73.95,0,165.75
            S73.95,331.5,165.75,331.5c40.8,0,79.05-15.3,107.1-40.8l7.65,7.649v20.4L408,446.25L446.25,408L318.75,280.5z M165.75,280.5
            C102,280.5,51,229.5,51,165.75S102,51,165.75,51S280.5,102,280.5,165.75S229.5,280.5,165.75,280.5z"/>
             </g>
         </g>
    </svg>


    <section class="Provider">
        <h2>Lista de proveedores</h2>
        <table class="Table BackContainer">
            <thead>
            <tr>
                <th>Nombre proveedor</th>
                <th>Email</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if(auth()->user()->role_id != 5)
                @foreach($users as $user)
                    <tr>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td>@if( $user->provider) {{$user->provider->contact}} @endif</td>
                        <td>@if( $user->provider) {{$user->provider['contact-phone']}} @endif</td>
                        <td>
                            @if(!$user->provider)
                                Sin registro
                            @elseif($user->provider->validate == 0)
                                Sin validar
                            @else
                                Activo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('showUser',$user->id) }}" class="icon-binoculars">Ver</a>
                            <a href="#" data-id="{{ $user->id }}" class="CategoryDelete icon-remove">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach($users as $user)
                    <tr>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td>@if( $user->provider) {{$user->provider->contact}} @endif</td>
                        <td>@if( $user->provider) {{$user->provider['contact-phone']}} @endif</td>
                        <td>
                            @if(!$user->provider)
                                Sin registro
                            @elseif($user->provider->validate == 0)
                                Sin validar
                            @else
                                Activo
                            @endif
                        </td>
                        <td>
                            @if($user->provider && $user->provider->validate == 0)
                                <a href="{{ route('showUser',$user->id) }}" class="icon-binoculars">Ver</a>
                            @endif
                            <a href="#" data-id="{{ $user->id }}" class="CategoryDelete icon-remove">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            <tr class="Subtable">
                <td>
                    <table class="Table">
                        <thead>
                        <tr>
                            <th>NOmbre</th>
                            <th>Telefono</th>
                            <th>Ciudad</th>
                            <th>Pais</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Santiago</td>
                            <td>4550786</td>
                            <td>Bogota</td>
                            <td>Colombia</td>
                            <td>Actualizar</td>
                        </tr>
                        <tr>
                            <td>Santiago</td>
                            <td>4550786</td>
                            <td>Bogota</td>
                            <td>Colombia</td>
                            <td>Actualizar</td>
                        </tr>
                        <tr>
                            <td>Santiago</td>
                            <td>4550786</td>
                            <td>Bogota</td>
                            <td>Colombia</td>
                            <td>Actualizar</td>
                        </tr>
                        <tr>
                            <td>Santiago</td>
                            <td>4550786</td>
                            <td>Bogota</td>
                            <td>Colombia</td>
                            <td>Actualizar</td>
                        </tr>
                        <tr>
                            <td>Santiago</td>
                            <td>4550786</td>
                            <td>Bogota</td>
                            <td>Colombia</td>
                            <td>Actualizar</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @if(auth()->user()->role_id != 5)
                @foreach($users as $user)
                    <tr>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td>@if( $user->provider) {{$user->provider->contact}} @endif</td>
                        <td>@if( $user->provider) {{$user->provider['contact-phone']}} @endif</td>
                        <td>
                            @if(!$user->provider)
                                Sin registro
                            @elseif($user->provider->validate == 0)
                                Sin validar
                            @else
                                Activo
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('showUser',$user->id) }}" class="icon-binoculars">Ver</a>
                            <a href="#" data-id="{{ $user->id }}" class="CategoryDelete icon-remove">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach($users as $user)
                    <tr>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td>@if( $user->provider) {{$user->provider->contact}} @endif</td>
                        <td>@if( $user->provider) {{$user->provider['contact-phone']}} @endif</td>
                        <td>
                            @if(!$user->provider)
                                Sin registro
                            @elseif($user->provider->validate == 0)
                                Sin validar
                            @else
                                Activo
                            @endif
                        </td>
                        <td>
                            @if($user->provider && $user->provider->validate == 0)
                                <a href="{{ route('showUser',$user->id) }}" class="icon-binoculars">Ver</a>
                            @endif
                            <a href="#" data-id="{{ $user->id }}" class="CategoryDelete icon-remove">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        {!! $users->render() !!}
        </div>
    </section>

    <form role="form" method="post" id="FormUpdateProvider" action="{{ route('updateProvider',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

@endsection
@section('scripts')
    <script src="{{asset('js/activeProvider.js')}}"></script>
    <script src="{{asset('js/tables.js')}}"></script>
@endsection