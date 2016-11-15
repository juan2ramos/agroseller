<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Brand;
use Agrosellers\Entities\Farm;
use Agrosellers\Entities\Notification;
use Agrosellers\Entities\ProductProvider;
use Validator;
use Session;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Category;
use Agrosellers\Entities\ProductFile;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\Subcategory;
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
            ProductFile::create([
                'product_id' => $this->product->id,
                'name' => $fileName,
                'extension' => $Extension
            ]);
        }
    }

    function index()
    {
        $brands = Brand::all();
        $farms = Farm::all();
        $categories = Category::all();
        $user = auth()->user();
        if($user->role_id == 1){
            $products = Product::orderBy('id', 'DESC')->paginate(10);
            return view('back.productAdminList', compact('categories', 'products', 'farms', 'brands'));
        } else {
            $products = ProductProvider::where('provider_id', auth()->user()->provider->id)->orderBy('id', 'DESC')->paginate(10);
            return view('back.productProviderList', compact('categories', 'products', 'farms', 'brands'));
        }

    }
    
    function editProduct($id){
        $brands = Brand::all();
        $farms = Farm::all();
        $categories = Category::all();
        $user = auth()->user();

        $productEdit = Product::find($id);
        $offerEdit = $productEdit->offers()->first();
        $farms = Farm::all();
        $categories = Category::all();
        if($user->role_id == 1){
            return view('back.productAdminEdit', compact('productEdit', 'offerEdit', 'categories', 'farms', 'brands'));
        }
        return view('back.productEdit', compact('productEdit', 'offerEdit', 'categories', 'farms', 'brands'));
    }

    function updateProduct(Request $request, $id){
        $inputs = $request->all();
        $this->validator($request->file());
        $farms = "";

        foreach($request->all() as $key => $data){
            if(strstr($key, 'farm')){
                $farms .= $data . ',';
            }
        }

        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['farms'] = $farms;

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

        $this->product->update($inputs);
        //$this->product->offers()->first()->update($inputs);
        $this->createFile($request);

        return redirect()->back()->with('messageSuccess', 1);
    }

    function lockProduct($id){
        $product = Product::find($id);
        if($product->isActive)
            $product->update(['isActive' => 0]);
        else
            $product->update(['isActive' => 1]);
        return redirect()->route('newProduct');
    }

    function productAgentPreview($id){
        $product = Product::find($id);
        return view('back.productAgentPreview', compact('product'));
    }

    function productDetailPreview(Request $request){
        $input = $request->all();
        if(isset($input['subcategoryId']))
            $id = $input['subcategoryId'];
        else
            $id = $input['subcategoriesId'];
        $subcategory = Subcategory::find(intval($id));
        return view('front.productDetailSession', compact('input', 'subcategory'));
    }

    function validateProduct($id){
        $product = Product::find($id);
        if($product->isValidate)
            $product->update(['isValidate' => 0]);
        else
            $product->update(['isValidate' => 1, 'isActive' => 1]);

        return redirect()->route('showUser', $product->user()->first()->id);
    }

    function newProduct(ProductRequest $request)
    {
        $inputs = $request->all();
        $this->validator($request->file());
        $farms = "";

        foreach($request->all() as $key => $data){
            if(strstr($key, 'farm')){
                $farms .= $data . ',';
            }
        }

        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $inputs['user_id'] = Auth::user()->id;
        $inputs['slug'] = str_slug($inputs['name']);
        $inputs['farms'] = $farms;
        $inputs['brand_id'] = $inputs['brand'];

        $this->product = Product::create($inputs);
        $this->createFile($request);
        //$provider = Provider::where('user_id', auth()->user()->id)->first();

        /*Notification::create([
            'user_id' => $provider->agent()->first()->user_id,
            'text' => 'El proveedor ' . $provider['company-name'] . ' ha creado un producto',
            'url' => route('productAgentPreview', $this->product->id)
        ]);*/

        return redirect()->back()->with('messageSuccess', 1);
    }

    function newProductProvider(Request $request){
        $inputs = $request->all();
        $inputs['provider_id'] = auth()->user()->provider->id;
        ProductProvider::create($inputs);
        return redirect()->back()->with('messageSuccess', 1);
    }
}
