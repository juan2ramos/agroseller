<?php

namespace Agrosellers\Http\Controllers;


use Agrosellers\Entities\Product;
use Agrosellers\Entities\Question;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\ProductFile;


class ProductController extends Controller
{
    function indexBack()
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
        $files = $request->file();
        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = $this->removeAccents($inputs['name']);
        $product = Product::create($inputs);

        foreach ($files as $key => $file) {

            $fileName = str_random(40) . '**' . $request->file($key)->getClientOriginalName();
            $Extension = $request->file($key)->getClientOriginalExtension();
            $request->file($key)->move(base_path() . '/public/uploads/products/', $fileName);
            ProductFile::create(
                [
                    'product_id' => $product->id,
                    'name' => $fileName,
                    'extension' => $Extension
                ]);
        }

        return redirect()->back()->with('messageSuccess', 1);
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
    /*  function productDetailFront(Request $request, $slug){
          $product = Product::where('slug', '=', $slug)->first();
          if (is_null($product)) {
              return redirect()->route('product');
              /*$product = Product::where('slug', 'like', '%' . $slug . '%')->first();
              return redirect()->route('product', $product->slug);*/
    /*      }
          return view('front.productDetail',compact('product'));
      }*/
    function productDetailFront($id){
        $questions = Question::where('product_id' , '=', $id);
        $products = Product::all();
        $product = $products->find($id);
        $images = ProductFile::whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->get();
        return view('front.productDetail', compact('questions', 'product', 'images'));
    }
}
