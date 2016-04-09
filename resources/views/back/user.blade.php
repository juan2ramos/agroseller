@extends('layoutBack')

@section('content')

    <div class="BackContainer">
        <h2>Usuarios</h2>
        {{  $user }}
        <a href="{{route('validateProvider', $user->id)}}">Aprobar</a>
    </div>
@endsection