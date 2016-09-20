<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Agrosellers\Services\ZonaPagos;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        if (empty($cart = Session::get('cart')))
            return back();

        $inputs = $request->all();
        $zp = ZonaPagos::create();
        $id = $zp->invoiceRequest($inputs);

        $data = [];
        foreach ($cart as $item) {
            // Temporal  state_order_id Zona Pagos
            $value = (!$item->offers)
                ? $item->price
                : (Carbon::now()->between(new Carbon($item->offers->offer_on), new Carbon($item->offers->offer_off)))
                    ? $item->offers->offer_price
                    : $item->price;

            $data[$item->id] = ['quantity' => $item->quantity, 'state_order_id' => 2, 'value' => $value];
        }

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'description' => $inputs['descripcion_pago'],
            'name_client' => $inputs['nombre_cliente'] . ' ' . $inputs['apellido_cliente'],
            'identification_client' => $inputs['id_cliente'],
            'address_client' => $inputs['info_opcional1'],
            'phone' => $inputs['telefono_cliente'],
            'zp_buy_id' => $inputs['id_pago'],
            'zp_buy_token' => $id,
            'zp_state' => '888'
        ]);

        auth()->user()->orders()->save($order);
        $order->products()->attach($data);

        Session::forget('cart');
        Session::forget('valueTotal');

        return redirect()->to("https://www.zonapagos.com/" . env('ZP_ROUTE_CODE') . "/pago.asp?estado_pago=iniciar_pago&identificador=" . $id);
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
