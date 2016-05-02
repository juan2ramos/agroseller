<?php

namespace Agrosellers\Services;
use Agrosellers\Entities\Product;

class Products{

    private $products;

    function __construct(){
        $this->setProducts();
    }

    function getProducts(){
        return $this->products;
    }

    private function setProducts(){
        $Products = Product::all();
        $products = [[]];

        foreach ($Products as $Product){
            $name = $Product->name;
            $image = $Product->productFiles()->whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->first();
            $image = $image->name;

            $products =
            [
                [
                    'name' => "{$name}",
                    'type' => 'air',
                    'icon' => "uploads/products/{$image}"
                ],
            ];
        }

        $this->products = $products;
    }
}