<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Order;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\StateOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;
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

    public function showBack(){
        $orders = Auth::user()->orders()->has('products')->get();
        return view('back.orders', compact('orders'));
    }
    public function showBackProvider(){

        $orders = Order::whereHas('products', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->with('products')->get()->take(1);

        $array = [100, '200', 300, '400', 500];

        $array = array_where($array, function ($key, $value) {
            return is_string($value);
        });

        print_r($array);

        $states = StateOrder::lists('id','name');
        return view('back.ordersProvider', compact('orders','states'));
    }


}
