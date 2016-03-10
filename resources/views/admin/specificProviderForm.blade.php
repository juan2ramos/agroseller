@extends('admin.layout')

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
            <input type="text" class="form-control" placeholder="Nombre de la empresa" name="company-name">
            <input type="text" class="form-control" placeholder="Localizacion" name="location">
            <input type="text" class="form-control" placeholder="Direccion" name="address">
            <input type="text" class="form-control" placeholder="Contacto" name="contact">
            <input type="number" class="form-control" placeholder="Telefono de contacto" name="contact-phone">

            <textarea class="form-control" placeholder="Descripcion de la empresa" name="description"></textarea>
            <input type="number" class="form-control" placeholder="NIT" name="NIT">
            <input type="text" class="form-control" placeholder="URL video corporativo" name="url-video">
            <input type="text" class="form-control" placeholder="User ID" name="nick-name">
            <input type="text" class="form-control" placeholder="Director comercial" name="sales-manager-name">

            <input type="file" class="form-control" name="licence"> <!--Permiso de ventas-->
            <input type="file" class="form-control" name="legal-agent"> <!-- Copia representante legal -->
            <input type="text" class="form-control" placeholder="Tipo de contribuyente" name="taxpayer">
            <input type="number" class="form-control" placeholder="Tiempo promedio de despacho" name="dispatch-time">
            <input type="text" class="form-control" placeholder="URL sitio web" name="web-site">

            <h3>Datos bancarios</h3>
            <input type="text" class="form-control" placeholder="NOmbre del titular" name="titular-name">
            <input type="text" class="form-control" placeholder="NOmbre del banco" name="bank-name">
            <input type="text" class="form-control" placeholder="Pais" name="bank-country">
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
