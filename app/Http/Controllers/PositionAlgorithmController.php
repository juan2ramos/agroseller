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

        $lat = '3.41667';
        $lng = '-76.55';

        foreach ($products as $product) {
            $product->location2 = explode(',', $product->location);
            $product->distance = $this->distance($lat,$lng,$product->location2);
            //$collection->push(['farms' => $product->farms, 'distance' => $distance, 'id' => $product->id]);
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


        return $sorted;
    }

    private function farms($farms)
    {
        return -1;
        if (!Auth::check() || empty($farms))
            return 1;
            $farmsArray = explode(',' , $farms);
        return $farms;
    }
    private function distancePriority($distance)
    {
        return $distance < 100? -1 : ( $distance < 400 ? 0 : 1);
    }
    private function distance($lat,$lng,$location)
    {
        return 6371 *
        acos(
            cos(deg2rad($lat)) *
            cos(deg2rad($location[0])) *
            cos(deg2rad($location[1]) - deg2rad($lng)) +
            sin(deg2rad($lat)) * sin(deg2rad($location[0]))
        );;
    }
}
