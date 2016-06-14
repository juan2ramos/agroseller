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
            /* Temporal  state_order_id Zona Pagos*/

            $value = ($item->offers)?$item->offers->offer_price:$item->price;
            $data[$item->id] = [ 'quantity' => $item->quantity, 'state_order_id' => 2,'value' => $value];

        }
        $r = $request->all();
        $order = new Order($r);

        auth()->user()->orders()->save($order);
        $order->products()->attach($data);

        Session::forget('cart');
        Session::forget('valueTotal');


        return view('front.checkout' , ['success' => true]);
    }
}
