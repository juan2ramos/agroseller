<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Budget;
use Agrosellers\Entities\Order;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\ProductProvider;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\StateOrder;
use Agrosellers\Entities\StatePayments;
use Agrosellers\Services\ZonaPagos;
use Agrosellers\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    public function __construct()
    {
        if (!Session::has('cart')) Session::put('cart', array());
        if (!Session::has('valueTotal')) Session::put('valueTotal', array());
    }

    /**
     * @param Product $product
     * @param $quantity
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add($product, $quantity, $provider, $shipping = 0)
    {

        $product = ProductProvider::with('product', 'provider', 'taxes')->find($product);
        $cart = Session::get('cart');

        $product->quantity = $quantity;
        $product->shipping = $shipping;
        Session::flash('buy', 1);

        $cart[$product->id] = $product;
        $this->valueTotal($cart);

        Session::put('cart', $cart);

        return back();
    }

    public function delete($id)
    {
        $cart = Session::get('cart');
        unset($cart[$id]);

        Session::put('cart', $cart);
        Session::flash('buy', 1);
        $this->valueTotal($cart);

        return redirect()->route('home');
    }

    /**
     * @param $cart
     */
    private function valueTotal($cart)
    {
        $valueTotal = 0;
        foreach ($cart as $product) {
            /*$price = ($offer = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Carbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $product->offer_price = $price;
            $valueTotal += $product->quantity * $price;*/

            $valueTotal += $product
                    ->price * $product->quantity + $product->shipping;
        }

        Session::put('valueTotal', number_format($valueTotal, 0, " ", "."));

    }

    public function trash()
    {
        Session::forget('cart');
        Session::forget('valueTotal');
    }

    public function showBack(Request $request)
    {
        $open = $request->get('open');
        $orders = Auth::user()->orders()->with('productProviders.product')->orderBy('created_at', 'DESC')->get();

        foreach ($orders as $order) {
            $value = 0;
            foreach ($order->productProviders as $product) {
                $value += $product->totalValue = $product->pivot->value * $product->pivot->quantity + $product->pivot->lading;
            }
            $order->total = $value;
        }
        $states = StateOrder::lists('id', 'name');
        $statesPayments = StatePayments::lists('state_zp', 'name');
        return view('back.orders', compact('orders', 'states', 'statesPayments', 'open'));
    }

    public function showBackProvider()
    {

        $user = Auth::user()->provider;

        $orders = Order::whereHas('productProviders', function ($query) use ($user) {
            $query->whereRaw('product_providers.provider_id = ' . $user->id . ' and orders.zp_state = 1');
        })->with(['productProviders' => function ($q) use ($user) {
            $q->where('provider_id', $user->id);
        }, 'user', 'productProviders.product'])->get();

        foreach ($orders as $order) {
            $order->quantityProducts = $order->productProviders->count();

            $order->totalValueProducts = 0;
            $value = 0;
            foreach ($order->productProviders as $product) {

                $value += $product->totalValue = $product->pivot->value * $product->pivot->quantity;

                $order->total = $value;
            }
        }

        $states = StateOrder::lists('id', 'name');
        return view('back.ordersProvider', compact('orders', 'states'));
    }

    public function finalPay(Request $request)
    {
        $zp = ZonaPagos::create();
        $zp->insertPayResult($request->all());
    }

    public function sendMailRequest(Request $request)
    {

        $product = Product::where('id', $request->productShipping)->first();
        Mail::send('emails.shipping', ['product' => $product->name, 'user' => $request->all()], function ($m) {
            $m->from('logistica@agrosellers.com', 'Logistica');
            $m->to('alejandra.betancur@pypgroup.net', 'Alejandra')->subject('Solicitud envío');
        });
        return $request->all();
    }

    public function updateStateOrder(Request $request)
    {

        $orders = Order::with(['productProviders' => function ($query) use ($request) {
            $query->whereIn('product_provider_id', $request->input('productProvider'));
        }])->find($request->input('order_id'));

        foreach ($orders->productProviders as $productProvider) {
            $productProvider->pivot->state = $request->input('stateOrderSelect');
            $productProvider->pivot->save();
        }

        return $request->input('stateOrderSelect');
    }

}