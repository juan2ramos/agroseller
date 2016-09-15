<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Product;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PositionAlgorithmController extends Controller
{

    function index()
    {

        $products = Product::whereRaw('isValidate = 1 and isActive = 1')
            ->with(['offers', 'productFiles', 'subcategory'])
            ->get();

        $lat = '-75.145';
        $lng = '4.45056';
        foreach ($products as $product) {
            $product->location2 = explode(';', $product->location);
            $product->distance = $this->distance($lat, $lng, $product->location2);
        }

        $sorted = $products->sortBy(function ($p, $key) {
            $m[-1][-1] = -1;
            $m[-1][0] = 0;
            $m[-1][1] = 1;
            $m[0][-1] = 0;
            $m[0][0] = 0;
            $m[0][1] = 1;
            $m[1][-1] = 0;
            $m[1][0] = 0;
            $m[1][1] = 1;
            return $m[$this->distancePriority($p['distance'])][$this->farms($p['farms'])];

        });
        /*$sorted = $products->sortBy(function ($p, $key) {
            return $this->distancePriority($p['distance']);
        });*/
     /*    foreach($sorted as $p){

             echo 'Producto: ';print_r($p->id);echo '<br>';
             echo " &#31; &#31; &#31; &#31; nombre: ";print_r($p->name);echo '<br>';
             echo " &#31; &#31; &#31; &#31; cordenadas: ";print_r($p->location);echo '<br>';
             echo " &#31; &#31; &#31; &#31; cordenadas 2: ";print_r($p->location2);echo '<br>';
             echo " &#31; &#31; &#31; &#31; distancia: ";print_r($p->distance );echo '<br>';
         }
        dd();*/


        return $sorted->slice(1, 52);
    }

    private function farms($farms)
    {
        return -1;
        if (!Auth::check() || empty($farms))
            return -1;

        $farmsArray = explode(',', $farms);

        return $farms;
    }

    private function distancePriority($distance)
    {
        return $distance < 20 ? -1 : ($distance < 40 ? 0 : 1);
    }

    private function distance($lat, $lng, $locations)
    {
        $dists = [];
        foreach ($locations as $location) {
            $locationArray = explode('&', $location);
            if (!is_numeric($locationArray[0]) || !is_numeric($locationArray[1]) || empty($locationArray)) {
                continue;
            }

            $dists[] = 6371 *
                acos(
                    cos(deg2rad($lat)) *
                    cos(deg2rad($locationArray[1])) *
                    cos(deg2rad($locationArray[0]) - deg2rad($lng)) +
                    sin(deg2rad($lat)) * sin(deg2rad($locationArray[1]))
                );

        }

        return min($dists);
    }
}
