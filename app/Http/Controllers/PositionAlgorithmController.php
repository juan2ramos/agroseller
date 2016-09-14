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

        $lat = '-75.47649811005863';
        $lng = '6.223730438129726';
        $i = 0;
        foreach ($products as $product) {
            $i = $i + 1;
            $product->location2 = explode(';', $product->location);
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
        return 0;
        if (!Auth::check() || empty($farms))
            return 1;
            $farmsArray = explode(',' , $farms);
        return $farms;
    }
    private function distancePriority($distance)
    {
        return $distance < 100? -1 : ( $distance < 400 ? 0 : 1);
    }
    private function distance($lat,$lng,$locations )
    {
        $dists = [];
        foreach($locations as $location ){
            $locationArray = explode('&', $location);
            if(!is_numeric($locationArray[0]) || !is_numeric($locationArray[1]) || empty($locationArray) )  {
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
