<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Notification;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    function isActive(Request $request){
        $notification = Notification::find($request->input('id'));
        $notification->isOpen = 1;
        $notification->save();
        return ['success' => true];
    }
    function index(){
        $notifications = Notification::where('user_id',Auth::user()->id)->paginate(8);
        return view('back.notification', compact('notifications'));

    }
}
