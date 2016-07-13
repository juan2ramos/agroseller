@extends('layoutBack')
@section('content')

    <h2>Mis Compras</h2>
    <hr>
    <table class="Table Table-first BackContainer capitalize">
        <thead>
        <tr>
            <th></th>
            <th>Fecha de orden</th>
            <th>Fecha de actualización</th>
            <th>Productos</th>
            <th>Valor total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $order)

            <tr>
                <td>@if($order->products->count())
                        <button class="iconPlus {{($open && $key == 0)?'open':''}}"></button>@endif</td>
                <td> {{$order->created_budget}}</td>
                <td> {{$order->updated_budget}}</td>
                <td> {{$order->products->count()}}</td>
                <td> ${{$order->total}}</td>
            </tr>
            <tr class="SubTable2" style="{{($open && $key == 0)?'display: table-row;':''}} ">
                <td colspan="6">

                    <table class="Table">
                        <thead>
                        <tr>
                            <th colspan="3" >Producto</th>
                            <th>Cantidad</th>
                            <th>Valor Unidad</th>
                            <th>Valor Total</th>
                            <th>Estado</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order->products as $products)

                            <tr>
                                <td  colspan="3" ><a href="{{url('producto/' . $products->slug . '/' . $products->id) }}">{{$products->name}}</a></td>
                                <td>{{$products->pivot->quantity}}</td>
                                <td>${{$products->pivot->value}}</td>
                                <td>${{$products->totalValue}}</td>
                                <td>{{$states->search($products->pivot->state_order_id) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <form id="download" method="post" action="{{route('downloadBudget')}}">
        <input type="hidden" name="budget_id" id="budget">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
    @if($open)
        @include('messages',[
         'type' => 'ok',
         'title' => '¡Enhorabuena!',
         'message' => '<p>  Tu  compra se ha realizado con exito, acá puedes revisar el estado </p>'
          ])
    @endif
@endsection

@section('scripts')
    <script src="{{asset('js/tables2.js')}}"></script>
    <script>
        function submitform(idBudget) {
            $("#budget").val(idBudget);

            $('#download').attr('target', '_blank').submit()


        }
    </script>
@endsection