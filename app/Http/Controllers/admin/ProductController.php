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
    private $product;

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

    private function createFile(Request $request){
        $files = $request->file();
        foreach ($files as $key => $file) {

            $fileName = str_random(40) . '**' . $request->file($key)->getClientOriginalName();
            $Extension = $request->file($key)->getClientOriginalExtension();
            $request->file($key)->move(base_path() . '/public/uploads/products/', $fileName);
            ProductFile::create(
                [
                    'product_id' => $this->product->id,
                    'name' => $fileName,
                    'extension' => $Extension
                ]);
        }
    }

    function index()
    {
        $categories = Category::all();
        $products = Product::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('back.product', compact('categories', 'products'));
    }
    function editProduct($id){
        $productEdit = Product::find($id);
        $categories = Category::all();
        return view('back.productEdit', compact('productEdit', 'categories'));
    }

    function updateProduct(Request $request, $id){
        $inputs = $request->all();
        $this->validator($request->file());

        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $inputs['user_id'] = Auth::user()->id;

        $this->product = Product::find($id);

        if ($request->has('deleteImages')){
            $deleteImages = explode(';', $inputs['deleteImages']);
            $files = $this->product->productFiles()->get();
            foreach($deleteImages as $imageName){
                foreach($files as $file){
                    if($file->name == $imageName){
                        unlink('uploads/products/' . $imageName);
                        $file->delete();
                    }
                }
            }
        }

        $this->product->fill($inputs);
        $this->createFile($request);
        $this->product->save();

        return redirect()->back()->with('messageSuccess', 1);
    }

    function delete(Request $request){
        $product = Product::find($request->id);
        $product->delete();
    }

    function newProduct(Request $request)
    {
        $inputs = $request->all();
        $this->validator($request->file());
        
        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['name']);
        $this->product = Product::create($inputs);

        $this->createFile($request);
        return redirect()->back()->with('messageSuccess', 1);
    }
}
