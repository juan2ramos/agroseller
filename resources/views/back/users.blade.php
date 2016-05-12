@extends('layoutBack')

@section('content')
    <svg width="81px" height="47px" display="none" viewBox="0 0 81 47" version="1.1">
        <g id="imageTemp" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="Paso-2" transform="translate(-627.000000, -1870.000000)" fill="#C5C5C5">
                <g id="imagenes" transform="translate(307.000000, 1823.000000)">
                    <g id="Image" transform="translate(290.000000, 0.000000)">
                        <path d="M110.525,93.2974915 L92.6972512,47 L70.253812,76.5502124 L55.2899396,61.775896 L30,93.2974915 L110.525,93.2974915 Z M40.0227774,49.0124537 C36.6850109,49.0124537 33.9854165,51.7231055 33.9854165,55.0750888 C33.9854165,58.4239127 36.6865905,61.1345646 40.0227774,61.1345646 C43.3573847,61.1345646 46.0585588,58.4239127 46.0585588,55.0750888 C46.0585588,51.7231055 43.3573847,49.0124537 40.0227774,49.0124537 L40.0227774,49.0124537 Z"
                              id="Shape"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <div class="ContentInfo">
        <h2>Usuarios internos</h2>
        <hr>
        <form action="{{ route('searchUser') }}" method="post" class="Forms">
            <label for="Search" class="col-6 offset-6">
                <input type="text" name="search" id="Search">
                <span>Buscar usuario</span>
                <button>
                    <svg width="28px" height="27px" viewBox="0 0 28 27" version="1.1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink">

                        <title>Lupa</title>
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Planes" transform="translate(-888.000000, -74.000000)" fill="#27383F ">
                                <g id="Header">
                                    <g id="Header-bar" transform="translate(0.000000, 30.000000)"
                                    >
                                        <g id="buscar" transform="translate(518.000000, 35.000000)">
                                            <g id="Lupa" transform="translate(370.782222, 9.900000)">
                                                <path d="M9.52131943,19.0897741 C6.97879921,19.0897741 4.58888699,18.0971457 2.78882243,16.2933371 C0.989467667,14.4895285 0,12.0937006 0,9.54488705 C0,6.99607347 0.989467667,4.60024562 2.78882243,2.79572545 C4.58604777,0.991916844 6.97879921,0 9.52131943,0 C12.0638396,0 14.4565911,0.991916844 16.2531066,2.79572545 C19.9660947,6.51790408 19.9660947,12.57187 16.2531066,16.2933371 C14.4565911,18.0971457 12.0638396,19.0897741 9.52131943,19.0897741 L9.52131943,19.0897741 Z M9.52131943,1.60101356 C7.4053918,1.60101356 5.41509959,2.42642499 3.9174118,3.92710837 C2.42043382,5.4285033 1.59706044,7.42087573 1.59706044,9.54488705 C1.59706044,11.6653406 2.42043382,13.6612708 3.9174118,15.1619542 C5.41509959,16.6633491 7.40255258,17.4887605 9.52131943,17.4887605 C11.6365373,17.4887605 13.6275393,16.6633491 15.1245172,15.1619542 C18.213587,12.0659497 18.213587,7.02667061 15.1245172,3.92995461 C13.6275393,2.42927124 11.6393765,1.60101356 9.52131943,1.60101356 L9.52131943,1.60101356 Z"
                                                      id="Fill-1"></path>
                                                <path d="M25.6479062,25.6118979 C25.4427727,25.6118979 25.2404784,25.5343377 25.082192,25.3785057 L15.4969901,15.7667319 C15.1839663,15.4529332 15.1839663,14.947013 15.4969901,14.635349 C15.8107238,14.3215503 16.3153949,14.3215503 16.6255795,14.635349 L26.2107813,24.2442766 C26.524515,24.5587868 26.524515,25.0647071 26.2107813,25.3756595 C26.0553341,25.5343377 25.8502006,25.6118979 25.6479062,25.6118979 L25.6479062,25.6118979 Z"
                                                      id="Fill-2"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </label>

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>

        {!! $users->render() !!}

    </div>
    <h2>Crear usuario Interno</h2>
    <hr>
    <form class="Forms row columns" method="POST" action="{{ route('newUserAdmin') }}"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class=" col-6 center row middle">
            <label for="photo" class="col-9 Form-image">
                <input type="file" class="StepImages" name="photo" id="photo">
                <figure class=" row middle center ">
                    <svg width="81px" height="47px">
                        <use xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result"/>
            </label>
        </div>
        <div class="col-6 ">
            <label for="identification" class="DataForm ">
                <input type="number" id="identification" name="identification" value="{{ old('identification') }}">
                <span>Número de cédula</span>
            </label>
            <label for="name" class="DataForm ">
                <input type="text" id="name" name="name" value="{{ old('name') }}">
                <span>Nombre</span>
            </label>
        </div>
        <div class="col-6 ">
            <label for="last_name" class="DataForm ">
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
                <span>Apellido</span>
            </label>
        </div>
        <div class="col-6 ">
            <label for="mobile_phone" class="DataForm ">
                <input type="text" id="mobile_phone" name="mobile_phone" value="{{ old('mobile_phone') }}">
                <span>Celular</span>
            </label>
        </div>
        <div class="col-6 ">
            <label for="phone" class="DataForm ">
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                <span>Teléfono</span>
            </label>
        </div>
        <div class="col-6 ">
            <label for="email" class="DataForm ">
                <input type="email" id="email" name="email" value="{{ old('email') }}">
                <span>Email</span>
            </label>
        </div>
        <div class="col-6 ">
            <label for="password" class="DataForm ">
                <input type="password" id="password" name="password" value="{{ old('password') }}">
                <span>Password</span>
            </label>
        </div>
        <div class="col-6 ">
            <label for="role_id" class="DataForm ">

                <select name="role_id" id="roles">
                    <option value="">Selecciona un rol</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </label>
        </div>
        <div class="col-6 offset-6 Check-agent" id="checkAgent" >
        </div>
        <div class="row center col-12">
            <button class="Button col-6 "> AGREGAR USUARIO</button>
        </div>
    </form>
    @if (session('messageSuccess'))
        <div class="MessagePlatform row middle center">
            <div class="MessagePlatform-content">
                <span class="MessagePlatform-close">X</span>
                <h2>!Tienes un nuevo mensaje!</h2>
                <p>Tu producto ya casi esta listo, uno de nuestros agentes comerciales esta revisando que los datos que
                    nos has suminstrado esten orden.</p>
                <p>Una vez tu producto este listo y publicado se te notificará en tú centro de notificaciones, además te
                    enviaremos un correo electrónico.</p>
                <p>Si por alguna razón tu producto no es publicado, se te notificará por los mismos medios las razones y
                    los pasos que debes serguir para mejorar la publicación de tu producto.</p>
                <p>Gracias por elegirnos.</p>
                <p class="MessagePlatform-last">Centro de notificaciones <span>Agroseller</span></p>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="{{asset('js/images.js')}}"></script>
@endsection