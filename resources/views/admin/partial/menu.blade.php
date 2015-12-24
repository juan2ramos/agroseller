<?php
use Agrosellers\Services\Menu;
$menu = new Menu();
$menu =$menu->getMenu();
?>
<nav class="Nav">
    <ul>
        @foreach($menu as $key => $link)
            <li><a href="{{ route($link['route']) }}"><span class="{{ $link['class'] }}"></span>{{ $key }}</a></li>
        @endforeach
    </ul>
</nav>