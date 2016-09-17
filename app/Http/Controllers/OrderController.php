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
        if (empty($cart = Session::get('cart')))
            return back();
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

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'description' => $r['descripcion_pago'],
            'name_client' => $r['nombre_cliente'] . ' ' . $r['apellido_cliente'],
            'identification_client' => $r['id_cliente'],
            'address_client' => $r['info_opcional1'],
            'phone' => $r['telefono_cliente'],
            'zp_buy_id' => $r['id_pago'],
            'zp_buy_token' => $r['buy_number'],
            'zp_state' => '888'
        ]);

        auth()->user()->orders()->save($order);
        $order->products()->attach($data);

        Session::forget('cart');
        Session::forget('valueTotal');

        return redirect()->to('https://www.zonapagos.com/t_managementpas/pago.asp?estado_pago=iniciar_pago&identificador=' . $r['buy_number']);
        //return redirect()->action('ShoppingController@showBack', ['open' => true]);

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
