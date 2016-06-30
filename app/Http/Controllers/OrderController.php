<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    Public function add(Request $request)
    {
        if (empty($cart = Session::get('cart'))) {
            return back();
        }
        $data = [];
        foreach ($cart as $item) {
            /* Temporal  state_order_id Zona Pagos*/


            $value = (!$item->offers)
                ? $item->price
                : (Carbon::now()->between(new Carbon($item->offers->offer_on), new Carbon($item->offers->offer_off)))
                    ? $item->offers->offer_price
                    : $item->price;

            $data[$item->id] = ['quantity' => $item->quantity, 'state_order_id' => 2, 'value' => $value];

        }
        $r = $request->all();
        $order = new Order($r);

        auth()->user()->orders()->save($order);
        $order->products()->attach($data);

        Session::forget('cart');
        Session::forget('valueTotal');


        return view('front.checkout', ['success' => true]);
    }

    public function updateStateOrder(Request $request)
    {

        $ids = $request->input('ids');
        $sync = [];
        foreach($ids as $id){
            $sync[$id] = [ 'state_order_id' => $request->input('state')];
        }
        Order::find($request->input('order'))->products()->sync($sync, false);

        return ['success' => 1];
    }
}
