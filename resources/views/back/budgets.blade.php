@extends('layoutBack')
@section('content')

    <h2>Mis cotizaciones</h2>
    <hr>
    @if(!$budgets->isEmpty())
    <table class="Table Table-first BackContainer capitalize">
        <thead>
        <tr>
            <th></th>
            <th>Fecha de creación</th>
            <th>Productos</th>
            <th>Valor total</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($budgets as $budget)
            <tr>
                <td>@if($budget->number_products)
                        <button class="iconPlus"></button>@endif</td>
                <td> {{$budget->created_budget}}</td>
                <td> {{$budget->number_products}}</td>
                <td> ${{$budget->total_value}}</td>
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 106.254 127.08375000000001">
                        <path d="M7.3 7.276H39.12v-8.28H66.31v8.28h31.823v12.53H7.3zM15.608 25.12H91.36l-9.003 78.535H24.612m54.96-69.806h-7.538l-4.41 63.76h5.747zm-22.712.054h-7.54l.99 63.75h5.747zm-22.713.504h-7.54l6.39 63.63h5.747z"/>
                    </svg>

                </td>
            </tr>
            <tr class="SubTable2">
                <td colspan="5">

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
                        @foreach($budget->Products_array as $products)
                            <tr>
                                <td>{{$products['name']}}</td>
                                <td>{{$products['quantity']}}</td>
                                <td>${{$products['price']}}</td>
                                <td>${{$products['total']}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="Table-pdf">
                        <a href="javascript: submitform({{$budget->id}})" >
                            <span>Descarga en PDF</span>
                            <svg width="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                                <g fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M36.24 61.643h1.66c.843 0 1.58-.104 2.208-.31.63-.208 1.15-.497 1.563-.87.415-.37.723-.816.927-1.336.204-.518.306-1.088.306-1.71 0-.59-.098-1.132-.293-1.634-.195-.5-.496-.934-.903-1.297-.408-.363-.927-.646-1.56-.852-.63-.203-1.38-.305-2.248-.305h-4.28V66h2.62v-4.357zm0-6.323h1.66c.406 0 .76.05 1.056.148s.543.24.738.424c.194.184.34.404.437.664.097.258.145.545.145.86 0 .687-.19 1.228-.572 1.624-.38.396-.982.594-1.803.594h-1.66V55.32zM52.677 65.527c.797-.314 1.48-.75 2.048-1.31s1.007-1.226 1.318-2.003c.31-.777.468-1.63.468-2.555 0-.92-.156-1.767-.467-2.542-.312-.773-.75-1.44-1.318-2.004s-1.25-1-2.048-1.314-1.682-.47-2.654-.47H45.15V66h4.872c.973 0 1.858-.158 2.655-.473zm-4.89-10.144h2.235c.594 0 1.125.098 1.594.297.468.197.866.48 1.19.846.327.367.577.814.752 1.346.175.53.262 1.125.262 1.79 0 .67-.087 1.27-.262 1.798s-.425.98-.75 1.35c-.326.37-.725.65-1.192.846-.47.195-1 .293-1.594.293h-2.235v-8.567zM61.657 60.943h4.558v-2.06h-4.558v-3.5h5.43V53.33H59.02V66h2.637"/>
                                    <path d="M89.07 44.375l-6.887-5.088h-.07v-12.71h-.005L60.04 4.98l-.01.01H17.87V39.32l-6.94 5.242V73.28h6.938v21.737h64.246V73.28h6.938v-8.964l.017-19.94zM77.742 26.57l-17.73-.02.017-17.292L77.743 26.57zM56.938 8.088l-.022 21.555 22.104.025V44.39H20.962V8.088h35.976zm22.08 83.837H20.963V73.28h58.056v18.644zm6.94-21.736H14.023V47.485h71.933v22.703z"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    @else
        <p> No has realizado cotizaciones de productos </p>
    @endif
    <form id="download" target="_blank" method="post" action="{{route('downloadBudget')}}">
        <input type="hidden" name="budget_id" id="budget">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
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