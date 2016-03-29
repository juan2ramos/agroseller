<?php

namespace Agrosellers\Http\Controllers;


use Agrosellers\Entities\Product;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('back.product', compact('categories'));
    }

    function newProduct(Request $request)
    {
        $inputs = $request->all();

        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        if ($request->hasFile('composition')) {
            $inputs['composition'] = str_random(40) . '**' . $request->file('composition')->getClientOriginalName();
            $request->file('composition')->move(base_path() . '/public/uploads/products/', $inputs['composition']);
        }
        if ($request->hasFile('image-scale')) {
            $inputs['image-scale'] = str_random(40) . '**' . $request->file('image-scale')->getClientOriginalName();
            $request->file('image-scale')->move(base_path() . '/public/uploads/products/', $inputs['image-scale']);
        }

        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = $this->removeAccents($inputs['name']);

        Product::create($inputs);
        return redirect()->back();
    }

    private function removeAccents($string)
    {
        $notAllowed = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $allowed = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");

        $string = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
        $string = strtolower(str_replace($notAllowed, $allowed, $string));

        return (strrpos($string, "-") == strlen($string) - 1) ? substr($string, 0, -1) : $string;
    }

    function productFront(Request $request)
    {
        $products = Product::take(10)->get();
        return view('front.products', compact('products'));

    }
    function checkout(Request $request)
    {
        return view('front.checkout');
    }
    function productDetailFront(Request $request, $slug){

        $product = Product::where('slug', '=', $slug)->first();
        if (is_null($product)) {
            return redirect()->route('product');
            /*$product = Product::where('slug', 'like', '%' . $slug . '%')->first();
            return redirect()->route('product', $product->slug);*/
        }

        return view('front.productDetail',compact('product'));
    }

}
