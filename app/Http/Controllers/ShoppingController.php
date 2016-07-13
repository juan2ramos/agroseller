<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Budget;
use Agrosellers\Entities\Order;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\StateOrder;
use Agrosellers\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function add(Product $product, $quantity)
    {

        $cart = Session::get('cart');
        $product->quantity = $quantity;
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
            $price = ($offer = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Carbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $product->offer_price = $price;
            $valueTotal += $product->quantity * $price;
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

        $open = $request->get('open') ;

        $orders = Auth::user()->orders()->with('products')->orderBy('created_at','DESC')->get();

        foreach ($orders as $order) {
            $value = 0;
            foreach ($order->products as $product) {
                $value += $product->totalValue = $product->pivot->value * $product->pivot->quantity;
            }
            $order->total = $value;
        }
        $states = StateOrder::lists('id', 'name');
        return view('back.orders', compact('orders','states','open'));
    }

    public function showBackProvider()
    {
        $user = Auth::user();
        $orders = Order::whereHas('products', function ($query) use ($user) {
            $query->where('products.user_id', $user->id);
        })->with(['products' => function ($q) use ($user) {
            $q->where('products.user_id', $user->id)->with('offers');
        },'user'])->get();

        foreach ($orders as $order) {
            $order->quantityProducts = count($order->products);
            $order->totalValueProducts = 0;
            foreach ($order->products as $product) {
                $value = 0;
                foreach ($order->products as $product) {
                    $value += $product->totalValue = $product->pivot->value * $product->pivot->quantity;
                }
                $order->total = $value;
            }

        }
        $states = StateOrder::lists('id', 'name');
        return view('back.ordersProvider', compact('orders', 'states'));
    }

}
