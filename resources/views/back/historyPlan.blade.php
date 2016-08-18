@extends('layoutBack')
@section('content')

    <h2>Historial de pagos </h2>
    <hr>
    <table class="Table Table-first BackContainer capitalize">
        <thead>
        <tr>
            <th>Nombre del plan</th>
            <th>Descripción</th>
            <th>Periodo</th>
            <th>Valor</th>
            <th>Fecha de pago</th>
            <th>Fecha de corte</th>
        </tr>
        </thead>
        <tbody>
        @foreach($provider->planProvider as $plan)
            <tr>
                <td> {{$plan->name}}</td>
                <td> {{$plan->description}}</td>
                <td> {{$plan->period}}</td>
                <td> ${{$plan->pricePlan}}</td>
                <td> {{$plan->createdPlan}}</td>
                <td> {{$plan->cuteDate}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>

@endsection

@section('scripts')
    <script src="{{asset('js/tables2.js')}}"></script>
    <script>
        function submitform(idBudget){
            $("#budget").val(idBudget);
            $("#download").submit();
        }
    </script>
@endsection