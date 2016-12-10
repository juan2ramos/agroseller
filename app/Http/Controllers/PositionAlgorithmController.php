<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Product;
use Agrosellers\Entities\ProductProvider;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PositionAlgorithmController extends Controller
{

    function closeToMe($lat, $lng)
    {
        $products = Product::whereHas('providers', function ($query) {
            $query->where('isActive', 1);
        })->with(['subcategory', 'files'])->where('active', 1)->get();
        foreach ($products as $product) {
            $providers = $product->providers;
            foreach ($providers as $provider) {
                $provider->distance = $this->distance($lat, $lng, explode(';', $provider->pivot->location));
            }
            $product->distance = $providers->sortBy('distance')->first()->distance;

        }

        return $products->sortBy('distance');


    }

    /**
     * @param $name Name subcategories
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    function index($name)
    {

        if (!$name) {
            return Product::whereHas('providers', function ($query) {
                $query->where('isActive', 1);
            })->with(['subcategory', 'files'])->whereRaw('active = 1 ')->get();
        }
        return Product::where('active', 1)->whereHas('providers', function ($query) {
            $query->where('isActive', 1);
        })->with(['files', 'subcategory' => function ($sql) use ($name) {
            $sql->where('slug', $name);
        }])->whereHas(
            'subcategory', function ($sql) use ($name) {
            $sql->where('slug', $name);
        }
        )->get();


        /* Esto es temoporal focus group */
        if (empty($request->get('subcategory'))) {
            return ProductProvider::all();
            return ProductProvider::with(['offers', 'product'])->where('id', '>', 0)->get();

        }
        return ProductProvider::all();
        $sqlAdd = ($request->get('subcategory')) ? ' subcategory_id = ' . $request->get('subcategory') : '';
        return ProductProvider::with(['offers', 'product'])->whereRaw($sqlAdd)->get();

        /* Esto es temoporal focus group */

        $sqlAdd = ($request->get('subcategory')) ? ' and subcategory_id = ' . $request->get('subcategory') : '';
        $products = Product::whereRaw('isValidate = 1 and isActive = 1' . $sqlAdd)
            ->with(['offers', 'productFiles', 'subcategory'])
            ->get();
        $lat = '-75.58121155000003';
        $lng = '6.244207994244943';
        $position = $request->get('position')['coords'];
        if ($position) {
            $lat = $position['longitude'];
            $lng = $position['latitude'];
        }

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


        return $sorted->slice(1, 36);
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
