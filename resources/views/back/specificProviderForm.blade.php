@extends('layoutBack')

@section('content')
    <main class="Login">
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ route('insertProvider') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <h2>Complete sus datos</h2>
            <hr class="Logo-hr">

            <input type="file" class="form-control" name="logo"> <!--Logo empresa-->
            <input type="text" class="form-control" placeholder="Nombre de la empresa" name="company-name" value="{{ old('company-name')}}">
            <input type="text" class="form-control" placeholder="Localizacion" name="location">
            <input type="text" class="form-control" placeholder="Direccion" name="address" value="{{ old('address')}}">
            <input type="text" class="form-control" placeholder="Contacto" name="contact" value="{{ old('contact')}}">
            <input type="number" class="form-control" placeholder="Telefono de contacto" name="contact-phone">

            <textarea class="form-control" placeholder="Descripcion de la empresa" name="description" >{{ old('description')}}</textarea>
            <input type="number" class="form-control" placeholder="NIT" name="NIT">
            <input type="text" class="form-control" placeholder="URL video corporativo" name="url-video" value="{{ old('url-video')}}">
            <input type="text" class="form-control" placeholder="User ID" name="nick-name" value="{{ old('nick-name')}}">
            <input type="text" class="form-control" placeholder="Director comercial" name="sales-manager-name" value="{{ old('sales-manager-name')}}">

            <input type="file" class="form-control" name="licence"> <!--Permiso de ventas-->
            <input type="file" class="form-control" name="legal-agent"> <!-- Copia representante legal -->
            <input type="text" class="form-control" placeholder="Tipo de contribuyente" name="taxpayer" value="{{ old('taxpayer')}}">
            <input type="number" class="form-control" placeholder="Tiempo promedio de despacho" name="dispatch-time" value="{{ old('dispatch-time')}}">
            <input type="text" class="form-control" placeholder="URL sitio web" name="web-site" value="{{ old('web-site')}}">

            <h3>Datos bancarios</h3>
            <input type="text" class="form-control" placeholder="Nombre del titular" name="titular-name" value="{{ old('titular-name')}}">
            <input type="text" class="form-control" placeholder="Nombre del banco" name="bank-name" value="{{ old('bank-name')}}">
            <input type="text" class="form-control" placeholder="Pais" name="bank-country" value="{{ old('bank-country')}}">
            <input type="number" class="form-control" placeholder="Numero de cuenta" name="count-number">

            <button type="submit" class="Login-submit"> Enviar</button>
        </form>
    </main>
    <div class="Message" id="popup-provider">
        <div class="Message_Popup">
            <h3>Complete sus datos</h3>
                <p>Recuerde que para poder iniciar las ventas de su negocio, es necesario llenar el siguiente formulario</p>
            <button class="button">Aceptar</button>
        </div>
    </div>
@endsection
