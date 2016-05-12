<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Product;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class shoppingController extends Controller
{
    public function __construct(){
        if(!Session::has('cart')) Session::put('cart',array());
    }
    public function add(Product $product, $quantity){
        $cart = Session::get('cart');
        $product->quantity = $quantity;
        $cart[$product->id] = $product;
        Session::put('cart',$cart);
        return  redirect()->route('sesiones');
    }

}
