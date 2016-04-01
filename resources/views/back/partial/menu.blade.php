<?php
use Agrosellers\Services\Menu;
$menu = new Menu();
$menu =$menu->getMenu();
?>
<nav class="Nav col-2">
    <ul>
        @foreach($menu as $key => $link)
            <li>
                <a class="" href="{{ route($link['route']) }}">
                    <figure><img src="{{asset('images/'.$link['class'].'.svg')}}" alt=""></figure>
                    {{ $key }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>