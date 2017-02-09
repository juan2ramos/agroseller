@extends('partials.emails')

@section('emailMessage')
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content"
                 style="cursor:auto;color:#848484;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;">

                <p>¡Hola !. tienes una nueva compra para ver los detalles ve a <a
                            href="https://agrosellers.com/admin/mis-ordenes">tus ordenes</a></p>
                <h2>Productos</h2>
                <ul>
                    @foreach ($order->productProviders as $productProvider){
                    <li>{{$productProvider->product->name}}</li>
                    @endforeach
                </ul>
                <br>
                <p>¡Gracias por elegirnos como su aliado en las compras que necesita su campo!</p>
            </div>
        </td>
    </tr><!--
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#27383F;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;     font-weight: bolder;">
                ¡Lo tendremos en cuenta para ser parte de la red de compras de productos agrícolas más grande en Latinoamérica.!
            </div>
        </td>
    </tr>-->
@endsection