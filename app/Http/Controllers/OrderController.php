<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Order;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    Public function add(Request $request)
    {
        if(empty($cart = Session::get('cart')) ){
            return back();
        }
        $data = [];
        foreach($cart as $item){
            $data[$item->id] = [ 'quantity' => $item->quantity];
        }
        $data = $request->all();
        $data->state_order_id = 2; /*TEMPORAL*/
        $order = new Order($request->all());
        auth()->user()->$order()->save($order);
        $order->products()->attach($data);
        Session::forget('cart');
        return view('front.checkout' , ['success' => 'ok']);
    }
}
