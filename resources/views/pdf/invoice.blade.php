<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!doctype html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>Agrosellers Nº {{$budget->id}} - cliente: {{$user->name}}</title>
    <style>
        * {
            margin: 0;
            padding: 0
        }

        table {
            border-collapse: collapse;
            box-shadow: 0 0 1.875rem 0 rgba(0, 0, 0, 0.1);
        }

        table tr:nth-child(2n + 1) {
            background: #aeaeae;
        }

        td {

            padding-top: 20px;
            padding-bottom: 20px;
            padding-right: 20px;
        }

        thead {
            color: white;
            background: #27383F;

        }

        tr {
            border-bottom: 1px solid red;
        }
    </style>
</head>
<body style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; background: #F8F8F8; color: #27383F;'>
<div style="width: 100%;background: #27383F; padding: 28px 40px ; ">
    <div style="display: inline-block; width: 48%">
        <img alt=""
             src="https://agrosellers.com/images/agrosellers-logo.png"
             style="border:none;display:block;outline:none;text-decoration:none;max-width:150px;height:auto;"
             width="150" height="auto">
    </div>
    <h2 style="font-weight: 400; font-size: 16px;padding-top:20px ; display: inline-block; text-align: right; color: white; width: 50%">
        Agrosellers S.A.S <br>
        Nit:901004264-4<br>
        Tel:7678401 <br>
        Cra 51 #106-28 Oficina 302 <br>
        Bogotá Colombia
    </h2>

</div>
<h2 style="text-align: center; margin: 20px 0 0">COTIZACIÓN</h2>
<div style="padding: 40px">
    <p style="padding: 5px 0"><b>Cliente:</b> {{$user->name}}</p>
    <p style="padding: 5px 0"><b>Email:</b> {{$user->email}}</p>
    <p style="padding: 5px 0"><b>Fecha creación:</b> {{$budget->createdBudget}} </p>
    <p style="padding: 5px 0"><b>Fecha descarga:</b> {{$date}} </p>
    {{--  <p style="padding: 5px 0"><b>Teléfono: </b>{{$user->phone}}</p>--}}

    <table border="1" style="width: 100%;margin: 20px 0; ">
        <thead>
        <tr>
            <th style="padding: 10px;">Id</th>
            <th style="padding: 10px;" colspan="2">Producto</th>
            <th style="padding: 10px;">Cantidad</th>
            <th style="padding: 10px;">Valor Unidad</th>
            <th style="padding: 10px;">Valor Total</th>
        </tr>
        </thead>
        <tbody>
        <?php  $i = 0 ?>
        @foreach($budget->productProviders as $product)
            <tr>
                <td style="padding: 10px;boder:1px solid black ;">{{$product->id}}</td>
                <td colspan="2" style="padding: 10px;boder:1px solid black ;">{{$product->product->name}}</td>
                <td style="boder:1px solid black ;padding: 10px;text-align: center">{{$product->pivot->quantity}}</td>
                <td style="boder:1px solid black ;padding: 10px;text-align: center">${{number_format( $product->price, 0, " ", ".")}}</td>
                <td style="boder:1px solid black ;padding: 10px;text-align: center">${{number_format( $product->total_value, 0, " ", ".")}}</td>
                <?php  $i += $product->total_value  ?>
            </tr>
        @endforeach

        </tbody>
    </table>
    <p style="text-align: right; margin: 20px 0 0">
        <span style="border: 1px solid ; display: inline-block; padding: 10px ;border-bottom: none;">
            <b> Subtotal: ${{ number_format($i - ($i * 0.16), 0, " ", ".")   }}
            </b>
        </span>
    </p>

    <p style="text-align: right; margin: 0 0  ">
        <span style="border: 1px solid ; display: inline-block; padding: 10px;border-bottom: none; ">
            <b> IVA: ${{number_format( ($i * 0.16), 0, " ", ".")}}</b>
        </span>
    </p>

    <p style="text-align: right; margin: 0 0 60px; ">
        <span style="border: 1px solid ; display: inline-block; padding: 10px ">
            <b> Valor total: ${{number_format( $i, 0, " ", ".")}}</b>
        </span>
    </p>
    <div>
        <h3 style="font-size: 18px; padding-bottom: 4px ">Condiciones comerciales</h3>
        <hr style="margin-bottom: 10px">

        <p style="font-size: 14px ; padding-bottom: 4px"> - El precio del producto puede variar en el momento de la
            compra de acuerdo a cambios por parte del proveedor</p>

    </div>

</div>

<div style="position: fixed; bottom: 80px; text-align: center; width: 100%">
    {{--Agrosellers S.A.S - Calle 106a # 17a - 46 - Bogotá - Colombia <br>
    Teléfonos (57) 300 39 3332 -  (57 1) 6 93 93 44
--}}
</div>
</body>
</html>

