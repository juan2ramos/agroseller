@extends('layoutBack')

@section('content')
    <main class="Login">
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
        @endif

        <form id="Provider-form" class="Forms form-little ProviderForm row" role="form" method="POST" action="{{ route('insertProvider')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="title col-12">
                <h2>Complete sus datos</h2>
                <hr class="Logo-hr">
            </div>

            <div class="col-3">
                <div class="row Step-2Images Logo">
                    <label for="image">
                        <input type="file" class="StepImages" name="logo" id="image">
                        <figure class=" row middle center">
                            <!--<span>Svg para logo</span>-->
                        </figure>
                        <output class="result" />
                    </label>
                </div>
            </div>
            <div class="col-9">
                <input type="text" class="form-control" placeholder="Nombre de la empresa" name="company-name" value="{{ old('company-name')}}">
                <input type="number" class="form-control" placeholder="NIT" name="NIT" value="{{old('NIT')}}">
                <input type="text" class="form-control" placeholder="Tipo de contribuyente" name="taxpayer" value="{{ old('taxpayer')}}">
            </div>
            <div class="FormGroup">
                <input type="text" class="form-control" placeholder="URL sitio web" name="web-site" value="{{ old('web-site')}}">
                <input type="number" class="form-control" placeholder="Tiempo promedio de despacho (Días)" name="dispatch-time" value="{{ old('dispatch-time')}}">
            </div>
            <div class="FormGroup">
                <input type="text" class="form-control" placeholder="Contacto" name="contact" value="{{ old('contact')}}">
                <input type="number" class="form-control" placeholder="Telefono de contacto" name="contact-phone" value="{{old('contact-phone')}}">
            </div>
            <div class="FormGroup">
                <label textFile="Cedula representante legal" for="legal-agent" class="file">
                    <span>Sin archivos adjuntos</span>
                    <input  id="legal-agent" type="file" class="form-control" name="legal-agent">
                </label>
                <label textFile="Licencia de ventas" for="licence" class="file">
                    <span>Sin archivos adjuntos</span>
                    <input id="licence" type="file" class="form-control" name="licence">
                </label>
            </div>
            <textarea class="form-control" placeholder="Descripcion de la empresa" name="description" >{{ old('description')}}</textarea>
            <input type="text" class="form-control" placeholder="Direccion" name="address" value="{{ old('address')}}">

            <article class="Step-location col-12">
                <span class="Marker Button" id="addMaker">AÑADE UNA UBICACIÓN</span>
                <span class="Marker Button" id="removeMaker">ELIMINAR TODAS LAS UBICACIONES</span>
                <div id="Map" class="Map"></div>
            </article>
            <input type="hidden" id="Location" name="location" value="">
            <div class="title col-12">
                <h2>Datos bancarios <span>(Opcional)</span></h2>
                <hr class="Logo-hr">
            </div>
            <input type="text" class="form-control" placeholder="Nombre del titular" name="titular-name" value="{{ old('titular-name')}}">
            <input type="text" class="form-control" placeholder="Nombre del banco" name="bank-name" value="{{ old('bank-name')}}">
            <div class="FormGroup">
                <input type="text" class="form-control" placeholder="Pais" name="bank-country" value="{{ old('bank-country')}}">
                <input type="number" class="form-control" placeholder="Numero de cuenta" name="count-number" value="{{ old('count-number')}}">
            </div>

            <div class="FormGroup">
                <button class="Button">Enviar</button>
            </div>
        </form>
    </main>

    <div class="MessagePlatform row middle center">
        <div class="MessagePlatform-content">
            <span class="MessagePlatform-close">X</span>
            <h2>!Finaliza tu registro!</h2>
            <p>Para que empieces a vender es necesario que completes el registro.</p>
            <p>Si tienes alguna duda, no olvides contactar con nosotros.</p>
            <p>Gracias por elegirnos.</p>
            <p class="MessagePlatform-last">Centro de notificaciones <span>Agroseller</span></p>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/maps.js')}}"></script>
    <script>
        $('#legal-agent, #licence').on('change', function(){
            $(this).parent().addClass('withFiles');
            file = $(this).val();
            $(this).siblings().text(file);

        });
    </script>
@endsection
