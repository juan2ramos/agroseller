<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrosellers</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('styles')
            <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>

</head>
<body>
<svg viewBox="0 0 7 12" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
     style="display:none">
    <g id="arrow" transform="translate(-239.000000, -220.000000)" fill="#818181">
        <g id="arows" transform="translate(239.000000, 220.000000)">
            <path d="M2.85584492,9.15023539 L-2.44023535,3.8522724 C-2.71605326,3.57668984 -2.71605326,3.12978011 -2.44023535,2.85396221 C-2.16441745,2.5781443 -1.71774307,2.5781443 -1.44192516,2.85396221 L3.35500002,7.65277011 L8.1519252,2.85396221 C8.4277431,2.5781443 8.87441749,2.5781443 9.15023539,2.85396221 C9.42605329,3.12978011 9.42605329,3.57668984 9.15023539,3.8522724 L3.85415511,9.15023539 C3.72189431,9.28273153 3.54256561,9.35709882 3.35500002,9.35709882 C3.16743443,9.35709882 2.98810573,9.28273153 2.85584492,9.15023539 Z"
                  id="Page-1-Copy-7"
                  transform="translate(3.355000, 6.002099) rotate(-90.000000) translate(-3.355000, -6.002099) "></path>
        </g>
    </g>
</svg>

<header class="row middle HeaderBack">
    <figure class="small-2 HeaderBack-figure">
        <a href="{{url('/')}}"> <img src="{{ url('images/logo-agrosellers.svg') }}" alt=""></a>
    </figure>
    <div class="row middle small-10 HeaderBack-right">
        <h1 class="small-6">
            <svg width="16px" height="16px" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">

                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dashboard" transform="translate(-243.000000, -26.000000)" fill="#27383F">
                        <g id="barTop" transform="translate(195.000000, 0.000000)">
                            <path d="M63.7788621,28.094 C62.0488621,26.783 59.3858621,26 56.6548621,26 C53.2778621,26 50.5258621,27.179 49.1058621,29.235 C48.4388621,30.2 48.0698621,31.344 48.0088621,32.633 C47.9548621,33.781 48.1478621,35.051 48.5818621,36.417 C50.0638621,31.973 54.2038621,28.494 58.9768621,28.494 C58.9768621,28.494 54.5108621,29.669 51.7028621,33.31 C51.7008621,33.312 51.6638621,33.358 51.5998621,33.446 C51.0358621,34.2 50.5448621,35.058 50.1768621,36.029 C49.5538621,37.511 48.9768621,39.544 48.9768621,41.994 L50.9768621,41.994 C50.9768621,41.994 50.6728621,40.084 51.2008621,37.888 C52.0738621,38.006 52.8548621,38.065 53.5578621,38.065 C55.3968621,38.065 56.7038621,37.667 57.6728621,36.813 C58.5408621,36.048 59.0198621,35.019 59.5268621,33.931 C60.3008621,32.268 61.1778621,30.384 63.7248621,28.929 C63.8708621,28.846 63.9648621,28.695 63.9758621,28.527 C63.9868621,28.359 63.9128621,28.198 63.7788621,28.096 L63.7788621,28.094 Z"
                                  id="Shape"></path>
                        </g>
                    </g>
                </g>
            </svg>
            Bienvenido(a) a Agrosellers
        </h1>
        <div class="small-6 HeaderBack-profile row end middle ">
            <figure id="Notify">
                @if(auth()->user()->photo)
                    <img src="{{url('uploads/users/' . auth()->user()->photo)}}" alt="">
                @else
                    <img src="{{url('images/user.png')}}" alt="">
                @endif
                <span>{{$notify['count']}}</span>
                <div id="NotifyList" data-route="{{route('NotifyIsActive')}}">
                    <input type="hidden" id="tokenNotify" name="_token" value="{{ csrf_token() }}">
                    <div class="title">Notificiones</div>
                    <ul>
                        @foreach($notify['notifications'] as $noti)
                            <li  class="{{($noti->isOpen)?'':'isOpen'}}"><a data-id="{{$noti->id}}" href="{{$noti->url}}">{{$noti->text}}</a></li>
                        @endforeach
                    </ul>
                    <div class="all"><a href="{{route('NotifyAll')}}">Ver todas</a></div>
                </div>
            </figure>
            <h3>{{ auth()->user()->fullName()   }}
                <span>{{--{{ auth()->user()->role()->first()->name}}--}}</span></h3>
            <svg id="Profile-arrow" width="13px" height="8px" viewBox="0 0 13 8" version="1.1"
                 xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink">

                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Dashboard" transform="translate(-1079.000000, -26.000000)" fill="#A2A2A2">
                        <g id="barTop" transform="translate(195.000000, 0.000000)">
                            <g id="user" transform="translate(755.000000, 14.000000)">
                                <path d="M131.485281,9.48528137 L131.485281,17.4852814 L139.485281,17.4852814 L139.485281,16.0037999 L132.913853,16.0037999 L132.913853,9.48528137 L131.485281,9.48528137 Z"
                                      id="Path-23"
                                      transform="translate(135.485281, 13.485281) rotate(-45.000000) translate(-135.485281, -13.485281) "></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <ul class="HeaderBack-profileNav">
            <li><a href="{{route('indexProfile')}}">Perfil</a></li>
            <li><a href="{{ url('logout') }}">Cerrar Sesión</a></li>
        </ul>
    </div>
</header>
<main class="MainBack row">
    @include('back.partial.menu')
    <div class="small-10 MainBack-container">
        @yield('content')
    </div>
</main>
<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('scripts')
</body>
</html>