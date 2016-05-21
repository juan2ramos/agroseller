<p>{{$user->photo}}</p>
<p>{{$user->name}}</p>
<p>{{$user->email}}</p>
<p>{{$user->phone}}</p>
<p>{{$date}}</p>



<h2>Presupuestos Nº {{$budget->id}}</h2>
    <hr>
    <table class="Table Table-first BackContainer capitalize">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor Unidad</th>
            <th>Valor Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($budget->Products_array as $product)
            <tr>
                <td>{{$product['name']}}</td>
                <td>{{$product['quantity']}}</td>
                <td>${{$product['price']}}</td>
                <td>${{$product['total']}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <p>Valor total: {{$budget->total_value}}</p>

