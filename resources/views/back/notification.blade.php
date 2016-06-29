@extends('layoutBack')
@section('content')

    <h2>Notificaciones</h2>
    <hr>
    <table class="Table Table-first BackContainer capitalize">
        <thead>
        <tr>
            <th>Mensaje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td></td>
                <td></td>

            </tr>
        @endforeach

        </tbody>
    </table>

@endsection

@section('scripts')
    <script src="{{asset('js/tables2.js')}}"></script>
@endsection