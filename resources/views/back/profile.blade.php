@extends('layoutBack')

@section('content')
    <main>
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
        @endif

        @if($user->role->name === 'proveedor')
            <form id="Provider-form" class="Forms form-little ProviderForm row" role="form" method="POST" action="{{ route('providerUpdate')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="title col-12">
                    <h2>Actualice sus datos</h2>
                    <hr class="Logo-hr">
                </div>

                <div class="col-3">
                    <div class="row Step-2Images Logo">
                        <label for="image">
                            <input type="file" class="StepImages" name="logo" id="image">
                            <figure class=" row middle center">
                                    <!--<span>Svg para logo</span>-->
                            </figure>
                            <output class="result">
                            @if(auth()->user()->photo)
                                <figure>
                                    <img src='{{url("uploads/users/" . auth()->user()->photo)}}' alt="">
                                </figure>
                            </output>
                            @endif
                        </label>
                    </div>
                </div>

                <div class="col-9">
                    <label class="form-control" for="company-name">
                        <p> Razón social </p>
                        <input id="company-name" type="text" placeholder="Razón social" name="company-name" value="{{ $user->provider['company-name'] }}">
                    </label>
                    <label class="form-control" for="NIT">
                        <p> NIT </p>
                        <input type="number" class="form-control" placeholder="NIT" value="{{$user->provider['NIT']}}" disabled >
                    </label>
                        <!--<input   placeholder="Tipo de contribuyente"  value="{ old('taxpayer')}}">-->
                </div>

                <div class="FormGroup">
                    <label class="form-control" for="web-site">
                        <p> URL sitio web </p>
                        <input type="text" class="form-control" placeholder="URL sitio web" name="web-site" value="{{$user->provider['web-site']}}">
                    </label>
                    <label class="form-control" for="dispatch-time">
                        <p> Tiempo promedio de despacho (días) </p>
                        <input type="number" id="dispatch-time" class="form-control" placeholder="Tiempo promedio de despacho (Días)" name="dispatch-time" value="{{$user->provider['dispatch-time']}}">
                    </label>
                </div>

                <div class="FormGroup">
                    <label class="form-control" for="dispatch-time">
                        <p> Contacto </p>
                        <input type="text" class="form-control" placeholder="Contacto" name="contact" value="{{$user->provider['contact']}}">
                    </label>
                    <label class="form-control" for="dispatch-time">
                        <p> Teléfono de contacto </p>
                        <input type="number" class="form-control" placeholder="Telefono de contacto" name="contact-phone" value="{{$user->provider['contact-phone']}}">
                    </label>
                </div>

                <div class="FormGroup">
                    <!--<label textFile="Cedula representante legal" for="legal-agent" class="file">
                        <span>Sin archivos adjuntos</span>
                        <input  id="legal-agent" type="file" class="form-control" name="legal-agent">
                    </label>
                    <label textFile="Licencia de ventas" for="licence" class="file">
                        <span>Sin archivos adjuntos</span>
                        <input id="licence" type="file" class="form-control" name="licence">
                    </label>-->
                </div>
                <label class="form-control smaller-12" for="dispatch-time">
                    <p> Descripción de la empresa </p>
                    <textarea placeholder="Descripcion de la empresa" name="description" >{{$user->provider['description']}}</textarea>
                </label>
                <label class="form-control smaller-12" for="dispatch-time">
                    <p> Dirección empresa </p>
                    <input type="text" class="form-control" placeholder="Direccion" name="address" value="{{$user->provider['address']}}">
                </label>

                <article class="Step-location col-12">
                    <span class="Marker Button" id="addMaker">AÑADE UNA UBICACIÓN</span>
                    <span class="Marker Button" id="removeMaker">ELIMINAR TODAS LAS UBICACIONES</span>
                    <div id="Map" class="Map Editable"></div>
                </article>
                <input type="hidden" id="Location" name="location" value="{{$user->provider['location']}}">
                <!--<div class="title col-12">
                    <h2>Datos bancarios <span>(Opcional)</span></h2>
                    <hr class="Logo-hr">
                </div>
                <div class="FormGroup">
                    <select style="width: 50%; margin: 1.25rem 10px 0 0; height: 48px" name="country" id="countries">
                            <!-- OPTIONS LLAMADOS POR JAVASCRIPT -->
                <!--
                </select>
                    <label style="height:48px; width: calc(50% - 10px)" textFile="Certificado bancario" for="count-number" class="file">
                        <span>Sin archivos adjuntos</span>
                        <input id="count-number" type="file" class="form-control col-4" name="count-number">
                    </label>
                </div>

                <input type="text" class="form-control" placeholder="Nombre del titular" name="titular-name" value="{ old('titular-name')}}">-->
                <!--<input type="text" class="form-control" placeholder="Nombre del banco" name="bank-name" value="{ old('bank-name')}}">-->
                <div class="FormGroup">
                    <button class="Button">Enviar</button>
                </div>
            </form>
        @else
            <form id="Provider-form" class="Forms ProviderForm row" role="form" method="POST" action="{{ route('userUpdate')}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="title col-12">
                    <h2>Actualice sus datos</h2>
                    <hr class="Logo-hr">
                </div>

                <div class="col-3">
                    <div class="row Step-2Images Logo">
                        <label for="image">
                            <input type="file" class="StepImages" name="photo" id="image">
                            <figure class=" row middle center">
                                <!--<span>Svg para logo</span>-->
                            </figure>
                            <output class="result">
                            @if(auth()->user()->photo)
                                <figure>
                                    <img src='{{url("uploads/users/" . auth()->user()->photo)}}' alt="">
                                </figure>
                            </output>
                            @endif
                        </label>
                    </div>
                </div>
                <div class="col-4">
                    <label class="" for="name">
                        <input name="name" value="{{ $user->name }}" type="text">
                        <span>Primer nombre</span>
                    </label>
                    <label class="" for="last_name">
                        <input name="last_name" value="{{ $user->last_name }}" type="text">
                        <span>Primer apellido</span>
                    </label>
                </div>
                <div class="col-4 offset-1">
                    <label class="" for="second_name">
                        <input name="second_name" value="{{ $user->second_name }}" type="text">
                        <span>Segundo nombre</span>
                    </label>
                    <label class="" for="second_last_name">
                        <input name="second_last_name" value="{{ $user->second_last_name }}" type="text">
                        <span>Segundo apellido</span>
                    </label>
                </div>
                <div class="col-7">
                    <label class="" for="email">
                        <input value="{{ $user->email }}" type="text" disabled>
                        <!--<span>E-mail</span>-->
                    </label>
                    <label class="" for="mobile_phone">
                        <input name="mobile_phone" value="{{ $user->mobile_phone }}" type="number">
                        <span>Celular</span>
                    </label>
                </div>
                <div class="col-4 offset-1">
                    <label class="" for="identification">
                        <input name="identification" value="{{ $user->identification }}" type="number">
                        <span>Identificacion</span>
                    </label>
                    <label class="" for="phone">
                        <input name="phone" value="{{ $user->phone }}" type="number">
                        <span>Teléfono</span>
                    </label>
                </div>
                <div class="FormGroup">
                    <button class="Button">Enviar</button>
                </div>
            </form>
        @endif
    </main>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="{{asset('js/maps.js')}}"></script>
    <script>getPosition($('#Location').val())</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap" async defer></script>
    <script src="{{asset('js/forms.js')}}"></script>
    <script>
        $('#legal-agent, #licence, #count-number').on('change', function(){
            $(this).parent().addClass('withFiles');
            file = $(this).val();
            $(this).siblings().text(file);
        });

        $.getJSON("{{asset('js/countries.json')}}", function(data) {
            $.each( data, function( key, val ) {
                if(val == 'Colombia') $('#countries').append('<option value="' + val +'" selected>' + val + '</option>');
                else $('#countries').append('<option value="' + val +'">' + val + '</option>');
            });
        });
    </script>
@endsection
