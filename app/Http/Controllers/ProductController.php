<?php

namespace Agrosellers\Http\Controllers;


use Agrosellers\Entities\File;
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    function newProduct(Request $request)
    {
        $inputs = $request->all();

       //dd($inputs);

        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);

        if ($request->hasFile('composition')) {
            $compositionName = str_random(40) . '**' . $request->file('composition')->getClientOriginalName();
            $compositionExtension = $request->file('composition')->getClientOriginalExtension();
            $request->file('composition')->move(base_path() . '/public/uploads/products/', $compositionName);

        }
        if ($request->hasFile('image1')) {
            $image1Name = str_random(40) . '**' . $request->file('image1')->getClientOriginalName();
            $image1Extension = $request->file('image1')->getClientOriginalExtension();
            $request->file('image1')->move(base_path() . '/public/uploads/products/', $image1Name);
        }
        if ($request->hasFile('image2')) {
            $image2Name = str_random(40) . '**' . $request->file('image2')->getClientOriginalName();
            $image2Extension = $request->file('image2')->getClientOriginalExtension();
            $request->file('image2')->move(base_path() . '/public/uploads/products/', $image2Name);
        }
        if ($request->hasFile('image3')) {
            $image3Name = str_random(40) . '**' . $request->file('image3')->getClientOriginalName();
            $image3Extension = $request->file('image3')->getClientOriginalExtension();
            $request->file('image3')->move(base_path() . '/public/uploads/products/', $image3Name);
        }
        if ($request->hasFile('image4')) {
            $image4Name = str_random(40) . '**' . $request->file('image4')->getClientOriginalName();
            $image4Extension = $request->file('image4')->getClientOriginalExtension();
            $request->file('image4')->move(base_path() . '/public/uploads/products/', $image4Name);
        }



        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = $this->removeAccents($inputs['name']);

        $product = Product::create($inputs);

     /*   $dataFile = [
            'product_id' => $product->id,
            'name' => $compositionName,
            'ext' => $compositionExtension
        ];
        File::create($dataFile);*/

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
