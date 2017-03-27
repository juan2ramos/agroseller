<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Order;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\ProductProvider;
use Agrosellers\Services\P2P;
use Illuminate\Http\Request;
use Agrosellers\Services\ZonaPagos;
use Validator;
use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function add(Request $request)
    {
        if (empty(Session::get('cart')))
            return back();

        $validator = $this->validateCheckout($request);

        if ($validator->fails()) {
            return redirect('finalizar-compra')
                ->withErrors($validator)
                ->withInput();
        }

        $total = 0;
        $iva = 0;
        $inputs = $request->all();
        $products = [];
        $session = Session::get('cart');
        $productsProvider = ProductProvider::whereIn('id', array_keys($session))->get();

        foreach ($productsProvider as $product) {

            $price = $product->price * intval($session[$product->id]->quantity) + $product->shipping;

            if ($product->iva) {
                $iva += $price * 0.19;
            }
            $total += $price;
            $products[$product->id] =
                [
                    'quantity' => $session[$product->id]->quantity,
                    'value' => $product->price,
                    'product_provider_id' => $product->id,
                    'state' => 1,
                    'lading' => $session[$product->id]->shipping
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
        if ($request->input('pay_type') == 'zp') {
            $zp = ZonaPagos::create();
            $id = $zp->invoiceRequest($inputs);
            return redirect()->to("https://www.zonapagos.com/" . env('ZP_ROUTE_CODE') . "/pago.asp?estado_pago=iniciar_pago&identificador=" . $id);
        }
        if ($request->input('pay_type') == 'p2p') {
            $p2p = P2P::create();
            $inputs['ip'] = $request->ip();
            $inputs['userAgent'] = $request->header('User-Agent');
            return redirect()->to($p2p->createPay($inputs));
        }
    }



    private function validateCheckout($request)
    {
        return Validator::make($request->all(), [
            'nombre_cliente' => 'required',
            'apellido_cliente' => 'required',
            'tipo_id' => 'required',
            'id_cliente' => 'required',
            'info_opcional1' => 'required',
            'pay_type' => 'required',
        ], [
            'nombre_ciente.required' => 'El nombre es obligatorio',
            'apellido_cliente.required' => 'El apellido es obligatorio',
            'tipo_id.required' => 'El tipo de documento es obligatorio',
            'info_opcional1.required' => 'La dirección es obligatoria',
            'pay_type.required' => 'El método del pago es obligatorio',

        ]);
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
