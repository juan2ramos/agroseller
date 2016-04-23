<?php

namespace Agrosellers\Http\Controllers\admin;

use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Category;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\ProductFile;

use Agrosellers\Entities\Product;
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

        $files = $request->file();
        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['name']);
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


}
