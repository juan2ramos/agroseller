@inject('menu', 'Agrosellers\Services\Menu')
<nav class="Nav small-2">
    <ul>
        @foreach($menu->getMenu() as $key => $link)
            <li>
                <a class="" href="{{ route($link['route']) }}">
                    <figure><img src="{{asset('images/'.$link['class'].'.svg')}}" alt=""></figure>
                    {{ $key }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>