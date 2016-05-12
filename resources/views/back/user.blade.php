@extends('layoutBack')

@section('content')
    <section class="UserValidate row">
        <div class="title col-12">
            <h2>Proveedor - {{$user->name}}</h2>
            <hr class="Logo-hr">
        </div>
        <section class="BackContainer col-12 row">
            <article class="item col-6 row">
                <a class="Button col-12" href="/uploads/providers/{{$user->provider['legal-agent']}}" target="_blank">Cedula representante legal </a>
            </article>
            <article class="item col-6 row">
                <a class="Button col-12" href="/uploads/providers/{{$user->provider['licence']}}" target="_blank">Licencia </a>
            </article>
            
            <article class="item col-6">
                <h3>Nombre : </h3>
                <span>{{$user->name}} {{$user->second_name}} {{$user->last_name}} {{$user->second_last_name}}</span>
            </article>
            <article class="item col-6">
                <h3>Email : </h3>
                <span>{{$user->email}}</span>
            </article>
            <article class="item col-6">
                <h3>Empresa : </h3>
                <span>{{$user->provider['company-name']}}</span>
            </article>
            <article class="item col-6">
                <h3>NIT : </h3>
                <span>{{$user->provider->NIT}}</span>
            </article>
            <article class="item col-6">
                <h3>Tipo de contribuyente : </h3>
                <span>{{$user->provider->taxpayer}}</span>
            </article>
            <article class="item col-6">
                <h3>Dirección : </h3>
                <span>{{$user->provider->address}}</span>
            </article>
            <article class="item col-6">
                <h3>Sitio web : </h3>
                <span>{{$user->provider['web-site']}}</span>
            </article>
            <article class="item col-6">
                <h3>Tiempo promedio de despacho : </h3>
                <span>{{$user->provider['dispatch-time']}}</span>
            </article>
            <article class="item col-6">
                <h3>Contacto : </h3>
                <span>{{$user->provider->contact}}</span>
            </article>
            <article class="item col-6">
                <h3>Telefono contacto : </h3>
                <span>{{$user->provider['contact-phone']}}</span>
            </article>
            <article class="item col-12">
                <h3>Descripción de la empresa : </h3>
                <span>{{$user->provider->description}}</span>
            </article>
            <div class="item col-12">
                <a class="Button" href="{{route('validateProvider', $user->id)}}">Aprobar</a>
            </div>
        </section>
    </section>
@endsection