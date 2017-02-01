@extends('layoutBack')
@section('content')

    <h2>Mis Compras</h2>
    <hr>
    @if(!$orders->isEmpty())
        <table class="Table Table-first BackContainer capitalize">
            <thead>
            <tr>
                <th></th>
                <th>Fecha de orden</th>
                <th>Valor total</th>
                <th>Estado del pago</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $key => $order)

                <tr>
                    <td>@if($order->productProviders->count())
                            <button class="iconPlus {{($open && $key == 0)?'open':''}}"></button>@endif</td>
                    <td> {{$order->created_budget}}</td>
                    <td> ${{number_format($order->total, 0, " ", ".")}}</td>
                    <td>{{$statesPayments->search($order->zp_state)}}</td>
                </tr>
                <tr class="SubTable2" style="{{($open && $key == 0)?'display: table-row;':''}} ">
                    <td colspan="6">

                        <table class="Table">
                            <thead>
                            <tr>
                                <th colspan="3">Producto</th>
                                <th>Cantidad</th>
                                <th>Valor Unidad + envio</th>
                                <th>Valor Total</th>
                                <th>Estado</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($order->productProviders as $products)
                                <tr>
                                    <td colspan="3"><a
                                                href="{{url('producto/' . $products->product->slug . '/' . $products->id) }}">{{$products->product->name}}</a>
                                    </td>
                                    <td>{{$products->pivot->quantity}}</td>
                                    <td>${{number_format($products->pivot->value, 0, " ", ".")}} +
                                        ${{number_format($products->pivot->lading, 0, " ", ".")}}
                                    </td>
                                    <td>
                                        ${{number_format($products->totalValue + $products->pivot->lading, 0, " ", ".")}}</td>
                                    <td>
                                        @if($order->zp_state == 1)
                                            {{$states->search($products->pivot->state) }}
                                        @else
                                            {{$statesPayments->search($order->zp_state)}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @else
        <p>No tienes compras</p>
    @endif
    <form id="download" method="post" action="{{route('downloadBudget')}}">
        <input type="hidden" name="budget_id" id="budget">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    <p id="demo"></p>
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

        $('.BuyDetail').on('click', function () {

            var param = {
                "int_id_tienda": "14992",
                "str_id_clave": "pyp123",
                "str_id_pago": "20160917172314526" //$(this).attr('buy')
            };

            console.log(param);

            /* var xhttp = new XMLHttpRequest();
             xhttp.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
             document.getElementById("demo").innerHTML = this.responseText;
             }
             };
             xhttp.open("POST", "https://www.zonapagos.com/api_verificar_pagoV3/api/verificar_pago_v3", true);
             xhttp.setRequestHeader("Content-type", "text/xml, application/xml");
             xhttp.send("int_id_tienda=14992&str_id_clave=pyp123&str_id_pago=20160917172314526");
             */
            /*$.ajax({
             url : "https://www.zonapagos.com/api_verificar_pagoV3/api/verificar_pago_v3",
             data: param,
             type: "POST",
             dataType: "xml",
             }).then(function (xml) {
             var str = xml.documentElement;
             console.log(str);
             });*/

            $.ajax({
                url: "https://www.zonapagos.com/api_verificar_pagoV3/api/verificar_pago_v3",
                data: param,
                type: "post",
                dataType: "xml"
            }).then(function (xml) {

                console.log(xml);
                var str = xml.documentElement;
                console.log(str);
            });
        });
    </script>
@endsection

