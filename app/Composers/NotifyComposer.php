<?php

namespace Agrosellers\Composers;


use Agrosellers\Entities\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class NotifyComposer
{
    public function compose(View $view){
        $notify = Notification::where('user_id',Auth::user()->id)->get()->take(10);
        $view->with('notify', $notify );
    }
}