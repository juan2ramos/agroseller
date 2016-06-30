<?php

namespace Agrosellers\Composers;


use Agrosellers\Entities\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class NotifyComposer
{
    public function compose(View $view){
        $notify['count'] = Notification::whereRaw('isOpen = 0 and user_id = '.Auth::user()->id)->count();
        $notify['notifications'] = Notification::where('user_id',Auth::user()->id)->take(10)->get();

        $view->with('notify', $notify );
    }
}