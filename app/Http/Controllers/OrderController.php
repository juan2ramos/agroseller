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


        $total = 0;
        $iva = 0;
        $inputs = $request->all();
        $products = [];

        foreach (Session::get('cart') as $product) {
            $taxesVal = 0;
            $price = $product->price * intval($product->quantity);

            foreach ($product->taxes as $tax) {
                $taxesVal += $tax->percent;
                $iva += strtolower($tax->name) == 'iva' ? ($price * $tax->percent / 100) : 0;
            }

            $total += $price + ($price * $taxesVal / 100);
            $products[$product->id] =
                [
                    'quantity' => $product->quantity,
                    'value' => $product->price,
                    'product_provider_id' => $product->id,
                    'state' => 1
                ];
        }

        $inputs['total_con_iva'] = $total;
        $inputs['valor_iva'] = $iva;
        $inputs['id_pago'] = date_format(new \Jenssegers\Date\Date(), 'YmdHis') . rand(100, 999);
        $order = Order::create([
            'description' => $inputs['descripcion_pago'],
            'name_client' => $inputs['nombre_cliente'],
            'identification_client' => $inputs['id_cliente'],
            'address_client' => $inputs['info_opcional1'],
            'phone_client' => $inputs['telefono_cliente'],
            'user_id' => auth()->user()->id,
            'zp_buy_id' => $inputs['id_pago'],
            'zp_state' => -1,
            'zp_pay_value' => $total,
        ]);

        $order->productProviders()->attach($products);
        $zp = ZonaPagos::create();
        $id = $zp->invoiceRequest($inputs);
        return redirect()->to("https://www.zonapagos.com/" . env('ZP_ROUTE_CODE') . "/pago.asp?estado_pago=iniciar_pago&identificador=" . $id);
    }

    public function updateStateOrder(Request $request)
    {
        $ids = $request->input('ids');
        $sync = [];
        foreach ($ids as $id) {
            $sync[$id] = ['state_order_id' => $request->input('state')];
        }

        Order::find($request->input('order'))->products()->sync($sync, false);

        return ['success' => 1];
    }
}
