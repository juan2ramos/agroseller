@extends('layoutBack')
@section('content')

    <h2>Mis Compras</h2>
    <hr>
    <table class="Table Table-first BackContainer capitalize Order">
        <thead>
        <tr>
            <th></th>
            <th>Fecha de orden</th>
            <th>Fecha de actualización</th>
            <th>Productos</th>
            <th>Valor total</th>
            <th>Estado</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)

            <tr>
                <td>@if($order->quantityProducts)
                        <button class="iconPlus"></button>@endif</td>
                <td> {{$order->created_budget}}</td>
                <td> {{$order->updated_budget}}</td>
                <td> {{$order->quantityProducts}}</td>
                <td> ${{$order->totalValueProducts}}</td>
                <td> {{--{{$order->stateOrder()->first()->name}}--}} </td>
            </tr>
            <tr class="SubTable2">
                <td colspan="6">
                    <div class="Order-userData">
                        <h2>Datos del comprador</h2>
                        <hr>
                        <ul>
                            <li>Nombre : {{$order->name_client}}</li>
                            <li>Identificación : {{$order->identification_client}}</li>
                            <li>Dirección : {{$order->address_client}}</li>
                            <li>Teléfono : {{$order->phone_client}}</li>
                        </ul>
                    </div>
                    <table class="Table">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Valor Unidad</th>
                            <th>Valor Total</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($order->products as $products)
                            <tr>
                                <td>{{$products->name}}</td>
                                <td>${{$products->priceFinish}}</td>
                                <td>{{$products->pivot->quantity}}</td>
                                <td>${{$products->total}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <form action="" method="post" class="Order-formUpdate">
                        <select name="stateOrder" id="">
                            @foreach($states as $key => $state)
                                <option value="{{$state}}">{{$key}}</option>
                            @endforeach
                        </select>
                        <button class="Button"> Actualizar Pedido</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <form id="download" method="post" action="{{route('downloadBudget')}}">
        <input type="hidden" name="budget_id" id="budget">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
@endsection
@section('scripts')
    <script src="{{asset('js/tables2.js')}}"></script>
@endsection
