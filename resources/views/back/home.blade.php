@extends('layoutBack')

@section('content')
    <section class="AdminHome">
        <article class="AdminHome-article">
            <header class="AdminHome-header">
                <h2><span class="icon-cart"></span> Pedidos </h2>
                    <table class="AdminHome-table">
                        <thead>
                        <tr>
                            <th>Pedido</th>
                            <th>Fecha</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Insumo1</td>
                            <td>10-10-2015</td>
                            <td> <span class="icon-point-up"></span></td>
                        </tr>
                        <tr>
                            <td>Insumo2</td>
                            <td>10-10-2015</td>
                            <td> <span class="icon-point-up"></span></td>
                        </tr>
                        <tr>
                            <td>Insumo3</td>
                            <td>10-10-2015</td>
                            <td> <span class="icon-point-up"></span></td>
                        </tr>
                        </tbody>
                    </table>
            </header>
        </article>
        <article class="AdminHome-article">
            <header class="AdminHome-header">
                <h2><span class="icon-briefcase"></span> Proveedores </h2>
            </header>
        </article>
        <article class="AdminHome-article">
            <header class="AdminHome-header">
                <h2><span class="icon-wallet"></span> Facturas </h2>
            </header>
        </article>
        <article class="AdminHome-article">
            <header class="AdminHome-header">
                <h2><span class="icon-user"></span> Clientes </h2>
            </header>
        </article>
        <article class="AdminHome-article">
            <header class="AdminHome-header">
                <h2><span class="icon-bars"></span> Reportes </h2>
                <figure>
                    <img src="{{url('images/graph.png')}}" alt="">
                </figure>
            </header>
        </article>
    </section>
@endsection