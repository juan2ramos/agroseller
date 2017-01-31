@extends('partials.emails')

@section('emailMessage')
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#848484;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;">
                <h3>Nueva Solicitud de producto</h3>

            <p>Nombre del producto: {{$product}}</p>
            <p>Nombre del usuario: {{$user['nameShipping']}}</p>
            <p>Email: {{$user['emailShipping']}}</p>
            <p>Celular: {{$user['phoneShipping']}}</p>
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