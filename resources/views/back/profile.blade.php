@extends('layoutBack')

@section('content')
    <main>
        @if (count($errors) > 0)
            <?php $errorArray = $errors->getMessages(); print_r($errorArray) ?>
        @endif

        <form id="Provider-form" class="Forms ProviderForm row" role="form" method="POST" action="{{ route('userUpdate')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="title small-12">
                <h2>Actualice sus datos</h2>
                <hr class="Logo-hr">
            </div>

            <div class="small-3">
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
            <div class="small-4">
                <label class="" for="name">
                    <input name="name" value="{{ $user->name }}" type="text">
                    <span>Primer nombre</span>
                </label>
                <label class="" for="last_name">
                    <input name="last_name" value="{{ $user->last_name }}" type="text">
                    <span>Primer apellido</span>
                </label>
            </div>
            <div class="small-4 offset-1">
                <label class="" for="second_name">
                    <input name="second_name" value="{{ $user->second_name }}" type="text">
                    <span>Segundo nombre</span>
                </label>
                <label class="" for="second_last_name">
                    <input name="second_last_name" value="{{ $user->second_last_name }}" type="text">
                    <span>Segundo apellido</span>
                </label>
            </div>
            <div class="small-7">
                <label class="" for="email">
                    <input value="{{ $user->email }}" type="text" disabled>
                    <!--<span>E-mail</span>-->
                </label>
                <label class="" for="mobile_phone">
                    <input name="mobile_phone" value="{{ $user->mobile_phone }}" type="number">
                    <span>Celular</span>
                </label>
            </div>
            <div class="small-4 offset-1">
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
    </main>
@endsection
@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbS0xs79_QKS4HFEJ_1PcT5bZYSBIByaA&signed_in=true&callback=initMap"
            async defer></script>
    <script src="{{asset('js/maps.js')}}"></script>
    <script src="{{asset('js/forms.js')}}"></script>
@endsection
