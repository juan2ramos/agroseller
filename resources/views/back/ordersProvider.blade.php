@extends('layoutBack')
@section('content')

    <h2>Mis Compras</h2>
    <hr>
    <input type="hidden" value="{{ csrf_token() }}" id="token" name="_token">
    <table class="Table Table-first BackContainer capitalize Order">
        <thead>
        <tr>
            <th></th>
            <th>Fecha de orden</th>
            <th>Fecha de actualización</th>
            <th>Productos</th>
            <th>Valor total</th>

        </tr>
        </thead>
        <tbody id="urlUpdate" data-url="{{route("updateStateOrderProvider")}}">
        @foreach($orders as $order)

            <tr>
                <td>@if($order->quantityProducts)
                        <button class="iconPlus"></button>@endif</td>
                <td> {{$order->created_budget}}</td>
                <td> {{$order->updated_budget}}</td>
                <td> {{$order->quantityProducts}}</td>
                <td> ${{number_format($order->total, 0, " ", ".")}}</td>
            </tr>
            <tr class="SubTable2"  data-order="{{$order->id}}">
                <td colspan="6">
                    <div class="Order-userData">
                        <h2>Datos del comprador</h2>
                        <hr>
                        <ul>
                            <li>Nombre : {{$order->name_client}}</li>
                            <li>Identificación : {{$order->identification_client}}</li>
                            <li>Dirección : {{$order->address_client}}</li>
                            <li>Teléfono : {{$order->phone_client}}</li>
                            <li>Email : {{$order->user->email}}</li>
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

                        @foreach($order->productProviders as $products)
                            <tr class="productProviders" data-products="{{$products->id}}">
                                <td>
                                    <a href="{{url('producto/' . $products->product->slug . '/' . $products->product->id) }}">{{$products->product->name}}</a>
                                </td>
                                <td>{{$products->pivot->quantity}}</td>
                                <td>${{number_format($products->pivot->value, 0, " ", ".")}}</td>
                                <td>${{number_format($products->totalValue, 0, " ", ".")}}</td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="Order-formUpdate">

                        <select name="stateOrder" class="stateOrderSelect">
                            @foreach($states as $key => $state)
                                <option {{($state == $order->productProviders->first()->pivot->state_order_id)?'selected':''}} value="{{$state}}">{{$key}}</option>
                            @endforeach
                        </select>
                        <button class="Button formUpdateOrder"> Actualizar Pedido</button>

                    </div>
                    <p class="successStateOrder "></p>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <input type="hidden" id="updateStateOrder" value="{{route('updateStateOrder')}}">
    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
@endsection
@section('scripts')
    <script src="{{asset('js/tables2.js')}}"></script>
    <script src="{{asset('js/orders.js')}}"></script>
@endsection
