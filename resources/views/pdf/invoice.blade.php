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
        table{
            border-collapse: collapse;
            box-shadow: 0 0 1.875rem 0 rgba(0, 0, 0, 0.1);
        }
        table tr:nth-child(2n + 1){
            background: #aeaeae;
        }
        td{

            padding-top:20px;
            padding-bottom:20px;
            padding-right:20px;
        }
        thead{
            color: white;
            background: #27383F;

        }
        tr{
            border-bottom: 1px solid red;
        }
    </style>
</head>
<body style='font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; background: #F8F8F8; color: #27383F;'>
<div style="width: 100%;background: #27383F; padding: 28px 40px ; ">
    <div style="display: inline-block; width: 48%">
        <img alt=""
             src="{{ url('images/agrosellers-logo.png') }}"
             style="border:none;display:block;outline:none;text-decoration:none;max-width:150px;height:auto;"
             width="150" height="auto">
    </div>
    <h2 style="font-weight: 400; font-size: 20px;padding-top:20px ; display: inline-block; text-align: right; color: white; width: 50%">
        Presupuesto Nº {{$budget->id}}</h2>

</div>
<div style="padding: 40px">
    <p style="padding: 5px 0"><b>Cliente:</b> {{$user->name}}</p>
    <p style="padding: 5px 0"><b>Email:</b> {{$user->email}}</p>
    <p style="padding: 5px 0"><b>Fecha creación:</b> {{$budget->createdBudget}} </p>
    <p style="padding: 5px 0"><b>Fecha descarga:</b> {{$date}} </p>
    <p style="padding: 5px 0"><b>Teléfono: </b>{{$user->phone}}</p>

    <table style="width: 100%;margin: 20px 0; " >
        <thead>
        <tr>
            <th style="padding: 10px;" colspan="2">Producto</th>
            <th style="padding: 10px;">Cantidad</th>
            <th style="padding: 10px;">Valor Unidad</th>
            <th style="padding: 10px;">Valor Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($budget->Products_array as $product)
            <tr>
                <td colspan="2" style="padding: 10px;" >{{$product['name']}}</td>
                <td style="padding: 10px;text-align: center">{{$product['quantity']}}</td>
                <td style="padding: 10px;text-align: center">${{$product['price']}}</td>
                <td style="padding: 10px;text-align: center">${{$product['total']}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <p style="text-align: right; margin: 20px 0 60px">
        <span style="border: 1px solid ; display: inline-block; padding: 10px">
            <b >Valor total: {{$budget->total_value}}</b>
        </span>
    </p>
    <div>
        <h3 style="font-size: 18px; padding-bottom: 4px ">Condiciones comerciales</h3>
        <hr style="margin-bottom: 10px">
        <p style="font-size: 14px ; padding-bottom: 4px"> - Los precios no incluye iva</p>
        <p style="font-size: 14px ; padding-bottom: 4px"> - El precio del producto puede variar de acuerdo al proveedor</p>
        <p style="font-size: 14px ; padding-bottom: 4px"> - Los precios no incluye iva</p>
        <p style="font-size: 14px ; padding-bottom: 4px"> - El precio del producto puede variar de acuerdo al proveedor</p>
        <p style="font-size: 14px ; padding-bottom: 4px"> - Los precios no incluye iva</p>
        <p style="font-size: 14px ; padding-bottom: 4px"> - El precio del producto puede variar de acuerdo al proveedor</p>
    </div>

</div>

<div style="position: fixed; bottom: 80px; text-align: center; width: 100%">
    Agrosellers S.A.S - Calle 106a # 17a - 46 - Bogotá - Colombia <br>
    Teléfonos (57) 300 39 3332 -  (57 1) 6 93 93 44

</div>
</body>
</html>

