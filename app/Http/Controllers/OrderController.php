<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Order;
use Illuminate\Http\Request;
use Agrosellers\Services\ZonaPagos;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        if (empty(Session::get('cart')))
            return back();
        
        $inputs = $request->all();
        $zp = ZonaPagos::create();
        $id = $zp->invoiceRequest($inputs);

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
