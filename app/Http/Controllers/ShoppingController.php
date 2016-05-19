<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
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
        Session::put('valueTotal', $valueTotal);

    }
    public function trash()
    {
        Session::forget('cart');
    }


}
