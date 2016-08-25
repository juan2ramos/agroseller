@extends('layoutBack')

@section('content')
    <form class="Forms row columns" method="POST" action="{{ route('newUserAdmin') }}"  enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!--<div class=" small-6 center row middle">
            <label for="photo" class="small-9 Form-image">
                <input type="file" class="StepImages" name="photo" id="photo">
                <figure class=" row middle center ">
                    <svg width="81px" height="47px">
                        <use xlink:href="#imageTemp"></use>
                    </svg>
                </figure>
                <output class="result"/>
            </label>
        </div>-->
        <div class="small-6 ">
            <label for="name" class="DataForm ">
                <input type="text" id="name" name="name" value="{{ $user->name }}">
                <span>Nombre</span>
            </label>
        </div>
        <div class="small-6 ">
            <label for="last_name" class="DataForm ">
                <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}">
                <span>Apellido</span>
            </label>
        </div>
        <div class="small-6 ">
            <label for="mobile_phone" class="DataForm ">
                <input type="text" id="mobile_phone" name="mobile_phone" value="{{ $user->mobile_phone }}">
                <span>Celular</span>
            </label>
        </div>
        <div class="small-6 ">
            <label for="phone" class="DataForm ">
                <input type="text" id="phone" name="phone" value="{{ $user->phone }}">
                <span>Teléfono</span>
            </label>
        </div>
        <div class="small-6 ">
            <label for="email" class="DataForm ">
                <input disabled="true" type="email" id="email" name="email" value="{{ $user->email }}">
                <span><!--Email--></span>
            </label>
        </div>
        <div class="small-6 ">
            <label for="password" class="DataForm ">
                <input type="password" id="password" name="password" value="{{ $user->password }}">
                <span>Password</span>
            </label>
        </div>
        <div class="small-6 ">
            <label for="role_id" class="DataForm ">
                <select name="role_id" id="roles">
                    <option value="">Selecciona un rol</option>
                    @foreach($roles as $role)
                        @if($role->id == $user->role_id)
                            <option value="{{$role->id}}" selected="true">{{$role->name}}</option>
                        @else
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endif
                    @endforeach
                </select>
            </label>
        </div>
        <div class="small-6 offset-6 Check-agent" id="checkAgent" >
        </div>
        <div class="row center small-12">
            <button class="Button small-6 "> ACTUALIZAR USUARIO</button>
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
                <p class="MessagePlatform-last">Centro de notificaciones <span>Agrosellers</span></p>
            </div>
        </div>
    @endif
@endsection