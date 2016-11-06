<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Date\Date;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'description', 'name_client', 'identification_client',
        'address_client', 'phone_client', 'zp_buy_id', 'zp_buy_token',
        'zp_state', 'zp_pay_form', 'zp_pay_value', 'zp_pay_credit'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity','state_order_id','value');
    }
    public function stateOrder(){
        return $this->belongsTo(StateOrder::class);
    }
    public function getNumberProductsAttribute()
    {
        return count($this->products()->get());
    }
    public function getCreatedBudgetAttribute()
    {
        $date = new Date($this->created_at);
        return $date->format('l j F Y');
    }
    public function getUpdatedBudgetAttribute()
    {
        $date = new Date($this->updated_at);
        return $date->format('l j F Y');
    }
    public function getTotalValueAttribute()
    {
        $valueTotal = 0;
        foreach ($this->with('products.offers')->get() as $product) {
            dd($product->products);
            $price = ($offer = $product->offers) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Cavhrbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $product->offer_price = $price;
            $valueTotal += $product->pivot->quantity * $price;
        }

        return number_format($valueTotal, 0, " ", ".");
    }

    public function getProductsArrayAttribute()
    {
        $products = [];
        foreach ($this->products()->get() as $product) {
            $price = ($offer = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Carbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $quantity = $product->pivot->quantity;
            $products[] = [
                'name' => $product->name,
                'price' => number_format($price, 0, " ", "."),
                'quantity' => $quantity,
                'total' => number_format($quantity * $price, 0, " ", "."),
            ];
        }

        return $products;
    }
    public function getProductsArrayProviderAttribute()
    {
        $products = [];
        $productsProvider = $this->products()->where('user_id',Auth::user()->id)->get();
        foreach ($productsProvider as $product) {
            $price = ($offer = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Carbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $quantity = $product->pivot->quantity;
            $products[] = [
                'name' => $product->name,
                'price' => number_format($price, 0, " ", "."),
                'quantity' => $quantity,
                'total' => number_format($quantity * $price, 0, " ", "."),
            ];
        }

        return $products;
    }
    public function getTotalValueProviderAttribute()
    {
        $valueTotal = 0;
        $productsProvider = $this->products()->where('user_id',Auth::user()->id)->get();
        foreach ($productsProvider as $product) {
            $price = ($offer = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Carbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $product->offer_price = $price;
            $valueTotal += $product->pivot->quantity * $price;
        }

        return number_format($valueTotal, 0, " ", ".");
    }
    public function getNumberProductsProviderAttribute()
    {
        return count($this->products()->where('user_id',Auth::user()->id)->get());
    }
}




