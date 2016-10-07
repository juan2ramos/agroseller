@extends('partials.emails')

@section('emailMessage')
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#848484;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;">
                <!--¡Hola {{$user->name}}!.
                </br></br>
                Bienvenido a la comunidad Agrosellers.
                </br></br>
                Ya eres un {{$user->role->name}} en nuestra plataforma.
                </br></br>
                Tu email de registro es {{$user->email}}
                </br></br>-->
                <p>¡Hola {{$user->name}}!. Bienvenido a su tienda en línea Agrosellers. Ya eres nuestro cliente, haga click <a href="https://agrosellers.com">aquí</a> para cotizar o comprar sus productos.</p>
                <br>
                <p>¡Gracias por elegirnos como su aliado en las compras que necesita su campo!</p>
            </div>
        </td>
    </tr>
    <tr>
        <td style="font-size:0;padding-top:10px;padding-bottom:10px;padding-right:25px;padding-left:25px;" align="left">
            <div class="mj-content" style="cursor:auto;color:#27383F;font-family:Ubuntu, Helvetica, Arial, sans-serif;font-size:14px;line-height:22px;     font-weight: bolder;">
                ¡Te tendremos en cuenta para que seas parte de la  red de compras de productos agrícolas más grande en Latinoamérica.!
            </div>
        </td>
    </tr>
@endsection