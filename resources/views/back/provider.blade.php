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
                            <a href="{{ route('showUser',$user->id) }}" class="views">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 25"><path d="M16 6c-.41 0-.797.08-1.168.193C15.518 6.51 16 7.195 16 8c0 1.104-.896 2-2 2-.805 0-1.49-.482-1.807-1.168-.115.372-.193.76-.193 1.168 0 2.21 1.79 4 4 4s4-1.79 4-4-1.79-4-4-4zm0-6C6 0 0 10 0 10s6 10 16 10 16-10 16-10S26 0 16 0zm0 16c-3.314 0-6-2.686-6-6s2.686-6 6-6c3.312 0 6 2.687 6 6s-2.688 6-6 6z"/></svg>
                            </a>
                            <a href="#" data-id="{{ $user->id }}" class="delete">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.254 127.08375000000001"><path d="M7.3 7.276H39.12v-8.28H66.31v8.28h31.823v12.53H7.3zM15.608 25.12H91.36v79.477H15.61z"/></svg>
                            </a>
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
                                <a href="{{ route('showUser',$user->id) }}" class="icon-binoculars">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125"><style>.st0{fill:#231F20;} .st1{fill:#FFFFFF;stroke:#231F20;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st2{fill:#FFFFFF;stroke:#808080;stroke-width:1.5;} .st3{fill:none;stroke:#808080;stroke-width:1.5;} .st4{fill:url(#SVGID_1_);} .st5{fill:#F2F2F2;} .st6{fill:#D9D9D9;} .st7{fill:none;stroke:#000000;stroke-miterlimit:10;} .st8{fill:#5D5D5D;} .st9{fill:none;stroke:#29ABE2;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st10{fill:none;stroke:#A67C52;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st11{fill:none;stroke:#8CC63F;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st12{fill:none;stroke:#000000;stroke-width:3;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st13{fill:none;stroke:#000000;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;} .st14{fill:none;stroke:#000000;stroke-width:2;stroke-miterlimit:10;} .st15{fill:none;stroke:#000000;stroke-width:5;stroke-miterlimit:10;} .st16{fill:none;stroke:#5D5D5D;stroke-width:5;stroke-miterlimit:10;} .st17{fill:none;stroke:#5D5D5D;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st18{fill:none;stroke:#000000;stroke-width:10;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st19{fill:none;stroke:#000000;stroke-width:5;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;} .st20{fill:none;stroke:#000000;stroke-width:8;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}</style><path d="M50 24.177c-28.032 0-43.866 23.272-44.526 24.263-.632.948-.632 2.172 0 3.12.66.99 16.494 24.263 44.526 24.263S93.866 52.55 94.526 51.56c.632-.948.632-2.172 0-3.12-.66-.99-16.493-24.263-44.526-24.263zm0 42.2c-9.03 0-16.378-7.346-16.378-16.377S40.97 33.622 50 33.622c9.03 0 16.378 7.347 16.378 16.378S59.03 66.378 50 66.378z"/>
                                    </svg>
                                </a>
                            @endif
                            <a href="#" data-id="{{ $user->id }}" class="CategoryDelete icon-remove">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.254 127.08375000000001"><path d="M7.3 7.276H39.12v-8.28H66.31v8.28h31.823v12.53H7.3m56.288-17.9h-21.3V7.35h21.3zM15.608 25.12H91.36l-9.003 78.535H24.612m54.96-69.806h-7.538l-4.41 63.76h5.747zm-22.712.054h-7.54l.99 63.75h5.747zm-22.713.504h-7.54l6.39 63.63h5.747z"/> </svg>
                            </a>
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
@endsection
