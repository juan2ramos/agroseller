<?php

namespace Agrosellers\Http\Controllers\admin;

use Validator;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Category;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Entities\ProductFile;

use Agrosellers\Entities\Product;
class ProductController extends Controller
{
    private function validator($data){
        $validator = Validator::make($data, [
            'composition' => 'mimes:pdf',
            'image1' => 'mimes:jpeg,svg,jpg,png',
            'image2' => 'mimes:jpeg,svg,jpg,png',
            'image3' => 'mimes:jpeg,svg,jpg,png',
            'image4' => 'mimes:jpeg,svg,jpg,png',
        ]);

        if($validator->fails()) {
            return redirect()
                ->route('products')
                ->withErrors($validator)
                ->withInput();
        }
    }

    function index()
    {
        $categories = Category::all();
        $products = Product::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get();
        return view('back.product', compact('categories', 'products'));
    }

    function delete(Request $request){
        $product = Product::find($request->id);
        $product->delete();
    }

    function newProduct(Request $request)
    {
        $inputs = $request->all();
        $files = $request->file();

        $this->validator($request->file());
        
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
