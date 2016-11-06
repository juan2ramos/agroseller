<?php

namespace Agrosellers\Entities;

use Agrosellers\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Budget extends Model
{
    protected $fillable = ['user_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }


    public function getNumberProductsAttribute()
    {
        return count($this->products()->get());
    }

    public function getCreatedBudgetAttribute()
    {

        $date = new Date($this->created_at);
        return $date->format('l j F Y H:i:s');
    }

    public function getTotalValueAttribute()
    {
        $valueTotal = 0;
        foreach ($this->products()->get() as $product) {
            $price = ($offer = $product->offers()->first()) ?
                (Carbon::now()->between(new Carbon($offer->offer_on), new Carbon($offer->offer_off)))
                    ? $offer->offer_price : $product->price : $product->price;
            $product->offer_price = $price;
            $valueTotal += $product->pivot->quantity * $price;
        }

        return $valueTotal;
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
                'id' => $product->id,
                'name' => $product->name,
                'price' => number_format($price, 0, " ", "."),
                'quantity' => $quantity,
                'total' => number_format($quantity * $price, 0, " ", "."),
            ];
        }

        return $products;
    }
}
