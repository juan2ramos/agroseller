@inject('menu', 'Agrosellers\Services\Menu')
<nav class="Nav col-2">
    <ul>
        @foreach($menu->getMenu() as $key => $link)
            @if($link['route'] == 'orderShowProvider' || $link['route'] == 'questions')
                <a class="" style="    opacity: 0.3;" href="#">
                    <figure>
                        <img src="{{asset('images/'.$link['class'].'.svg')}}" alt="">
                    </figure>
                    {{ $key }}
                </a>
            @else
                <a class="" href="{{ route($link['route']) }}">
                    <figure><img src="{{asset('images/'.$link['class'].'.svg')}}" alt=""></figure>
                    {{ $key }}
                </a>
            @endif
        @endforeach
    </ul>
</nav>