@extends('layoutBack')

@section('content')

    <div class="ContentInfo">
        <h2>Usuarios</h2>
        <hr>
        <form action="{{ route($routeSearch) }}" method="post" class="Forms">
            <label for="Search" class="col-6 offset-6">
                <input type="text" name="search" id="Search">
                <span>Buscar usuario</span>
                <button>
                    <svg width="28px" height="27px" viewBox="0 0 28 27" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">

                        <title>Lupa</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Planes" transform="translate(-888.000000, -74.000000)" fill="#27383F ">
                                <g id="Header">
                                    <g id="Header-bar" transform="translate(0.000000, 30.000000)"
                                    >
                                        <g id="buscar" transform="translate(518.000000, 35.000000)">
                                            <g id="Lupa" transform="translate(370.782222, 9.900000)">
                                                <path d="M9.52131943,19.0897741 C6.97879921,19.0897741 4.58888699,18.0971457 2.78882243,16.2933371 C0.989467667,14.4895285 0,12.0937006 0,9.54488705 C0,6.99607347 0.989467667,4.60024562 2.78882243,2.79572545 C4.58604777,0.991916844 6.97879921,0 9.52131943,0 C12.0638396,0 14.4565911,0.991916844 16.2531066,2.79572545 C19.9660947,6.51790408 19.9660947,12.57187 16.2531066,16.2933371 C14.4565911,18.0971457 12.0638396,19.0897741 9.52131943,19.0897741 L9.52131943,19.0897741 Z M9.52131943,1.60101356 C7.4053918,1.60101356 5.41509959,2.42642499 3.9174118,3.92710837 C2.42043382,5.4285033 1.59706044,7.42087573 1.59706044,9.54488705 C1.59706044,11.6653406 2.42043382,13.6612708 3.9174118,15.1619542 C5.41509959,16.6633491 7.40255258,17.4887605 9.52131943,17.4887605 C11.6365373,17.4887605 13.6275393,16.6633491 15.1245172,15.1619542 C18.213587,12.0659497 18.213587,7.02667061 15.1245172,3.92995461 C13.6275393,2.42927124 11.6393765,1.60101356 9.52131943,1.60101356 L9.52131943,1.60101356 Z"
                                                      id="Fill-1"></path>
                                                <path d="M25.6479062,25.6118979 C25.4427727,25.6118979 25.2404784,25.5343377 25.082192,25.3785057 L15.4969901,15.7667319 C15.1839663,15.4529332 15.1839663,14.947013 15.4969901,14.635349 C15.8107238,14.3215503 16.3153949,14.3215503 16.6255795,14.635349 L26.2107813,24.2442766 C26.524515,24.5587868 26.524515,25.0647071 26.2107813,25.3756595 C26.0553341,25.5343377 25.8502006,25.6118979 25.6479062,25.6118979 L25.6479062,25.6118979 Z"
                                                      id="Fill-2"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </label>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">


        </form>
        <table class="BackContainer Table">
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

@section('scripts')
    <script src="{{asset('js/forms.js')}}"></script>
@endsection