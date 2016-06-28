<?php

namespace Agrosellers\Composers;


use Agrosellers\Entities\Notification;
use Illuminate\View\View;


class NotifyComposer
{
    public function compose(View $view){

        Auth::user()->id;
        $notify = Notification::all()->take(10);
        $view->with('notify', $notify );
    }
}