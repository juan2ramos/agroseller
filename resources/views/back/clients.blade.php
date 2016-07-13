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
        <hr class="Logo-hr">
        <table class="Table BackContainer">
            <thead>
            <tr>
                <th>Nombre proveedor</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>


                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->render()  !!}

    </section>

    <form role="form" method="post" id="FormUpdateProvider" action="{{ route('updateProvider',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

@endsection
@section('scripts')
    <script src="{{asset('js/activeProvider.js')}}"></script>
@endsection
