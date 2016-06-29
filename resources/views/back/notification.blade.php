@extends('layoutBack')
@section('content')

    <h2>Notificaciones</h2>
    <hr>
    <table class="Table Table-first BackContainer capitalize">
        <thead>
        <tr>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notifications as $notifications)
            <tr>
                <td class=""><a href="{{$notifications->url}}">{{$notifications->text}}</a></td>
                <td>{{$notifications->created_at}}</td>

            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

@section('scripts')
    <script src="{{asset('js/tables2.js')}}"></script>
@endsection