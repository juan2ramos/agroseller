<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Brand;
use Agrosellers\Entities\City;
use Agrosellers\Entities\Farm;
use Agrosellers\Entities\FarmCategory;
use Agrosellers\Entities\Notification;
use Agrosellers\Entities\Offer;
use Agrosellers\Entities\Packing;
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

    private function validator($data)
    {
        $validator = Validator::make($data, [
            'composition' => 'mimes:pdf',
            'image1' => 'mimes:jpeg,svg,jpg,png',
            'image2' => 'mimes:jpeg,svg,jpg,png',
            'image3' => 'mimes:jpeg,svg,jpg,png',
            'image4' => 'mimes:jpeg,svg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('products')
                ->withErrors($validator)
                ->withInput();
        }
    }

    private function createFile(Request $request)
    {
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
        $farms = FarmCategory::with('farms')->get();
        $categories = Category::all();
        $user = auth()->user();
        $cities = City::lists('nombre_ciudad', 'id');

        if ($user->role_id == 1) {
            $products = Product::orderBy('id', 'DESC')->paginate(10);
            return view('back.productAdminList', compact('categories', 'products', 'farms', 'brands', 'cities'));
        } else {
            $products = ProductProvider::where('provider_id', auth()->user()->provider->id)->orderBy('id', 'DESC')->paginate(10);
            return view('back.productProviderList', compact('categories', 'products', 'farms', 'brands', 'cities'));
        }

    }

    function editProduct($id)
    {
        $brands = Brand::all();
        $farms = FarmCategory::with('farms')->get();
        $categories = Category::all();
        $user = auth()->user();
        $cities = City::lists('nombre_ciudad', 'id');
        if ($user->role_id == 1) {
            $productEdit = Product::find($id);
            return view('back.productAdminEdit', compact('productEdit', 'offerEdit', 'categories', 'farms', 'brands', 'cities'));
        } else {
            $productEdit = ProductProvider::with('packing', 'cities')->find($id);
            $offer = $productEdit->offer()->first();
            return view('back.productProviderEdit', compact('productEdit', 'offer', 'categories', 'farms', 'brands', 'cities'));
        }
    }

    function updateProductProvider(Request $request, $id)
    {

        $this->validate($request, [
            'city.*' => 'required|numeric',
            'packing.*.high' => 'required|numeric',
            'packing.*.width' => 'required|numeric',
            'packing.*.long' => 'required|numeric',
            'packing.*.quantity' => 'required|numeric',
            'price' => 'required',
            'min_quantity' => 'required',
            'available_quantity' => 'required',
        ]);
        $inputs = $request->all();

        if ($request->has('taxes'))
            $inputs['taxes'] = implode(';', $inputs['taxes']);
        $product = ProductProvider::find($id);

        if ($request->has('has_offer')) {

            $offer = $product->offer;
            $offer->offer_on = $inputs['offer_on'];
            $offer->offer_off = $inputs['offer_off'];
            $offer->offer_price = $inputs['offer_price'];

            $product->offer()->save($offer);
        } else {
            $inputs['has_offer'] = 0;
        }
        if (!$request->has('iva'))
            $inputs['iva'] = 0;

        $product->cities()->detach();
        $product->cities()->attach($inputs['city']);

        $product->packing()->delete();
        $packings = [];
        foreach ($inputs['packing'] as $packing) {
            $packings[] = new Packing($packing);
        }
        $product->packing()->saveMany($packings);
        $product->update($inputs);
        return redirect()->back()->with('messageSuccess', 1);
    }

    function updateProduct(Request $request, $id)
    {
        $inputs = $request->all();
        $this->validator($request->file());
        $farms = "";

        foreach ($request->all() as $key => $data) {
            if (strstr($key, 'farm')) {
                $farms .= $data . ',';
            }
        }
        if (!$request->has('canServientrega'))
            $inputs['canServientrega'] = 0;


        $inputs['user_id'] = Auth::user()->id;
        $inputs['farms'] = $farms;

        $this->product = Product::find($id);

        if ($request->has('deleteImages')) {
            $deleteImages = explode(';', $inputs['deleteImages']);

            $files = $this->product->productFiles()->get();
            foreach ($deleteImages as $imageName) {
                foreach ($files as $file) {
                    if ($file->name == $imageName) {
                        unlink('uploads/products/' . $imageName);
                        $file->delete();
                    }
                }
            }
        }
        if ($request->hasFile('composition') && isset($inputs['IdPdf'])) {
            ProductFile::find($inputs['IdPdf'])->delete();
        }


        $this->product->update($inputs);
        //$this->product->offers()->first()->update($inputs);


        $this->createFile($request);

        return redirect()->back()->with('messageSuccess', 1);
    }

    function lockProduct($id)
    {

        $product = ProductProvider::find($id);
        if ($product->isActive)
            $product->update(['isActive' => 0]);
        else
            $product->update(['isActive' => 1]);
        return redirect()->route('newProduct');
    }

    function productAgentPreview($id)
    {
        $product = Product::find($id);
        return view('back.productAgentPreview', compact('product'));
    }

    function productDetailPreview(Request $request)
    {
        $input = $request->all();
        if (isset($input['subcategoryId']))
            $id = $input['subcategoryId'];
        else
            $id = $input['subcategoriesId'];
        $subcategory = Subcategory::find(intval($id));
        return view('front.productDetailSession', compact('input', 'subcategory'));
    }

    function validateProduct($id)
    {
        $product = Product::find($id);
        if ($product->isValidate)
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

        foreach ($request->all() as $key => $data) {
            if (strstr($key, 'farm')) {
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

        return redirect()->back()->with('messageSuccess', 1);
    }

    function newProductProvider(Request $request)
    {


        $inputs = $request->all();

        $inputs['provider_id'] = auth()->user()->provider->id;



        $productProvider = ProductProvider::create($inputs);

        $packings = [];
        foreach ($inputs['packing'] as $packing) {
            $packings[] = new Packing($packing);
        }
        $productProvider->packing()->saveMany($packings);

        $productProvider->cities()->attach($inputs['city']);

        if ($request->has('has_offer')) {

            $dataOffer = [
                'offer_on' => $inputs['offer_on'],
                'offer_off' => $inputs['offer_off'],
                'offer_price' => $inputs['offer_price'],
            ];
            $offer = new Offer($dataOffer);
            $productProvider->offer()->save($offer);
        }

        return redirect()->back()->with('messageSuccess', 1);
    }

    function viewProduct($id)
    {


        $product = Product::findOrFail($id);
        $productAdmin = new \Agrosellers\Http\Controllers\ProductController();
        $featuresTranslate = $productAdmin->setFeaturesTranslate($product);
        return view('back.productDetail', compact('product', 'featuresTranslate'));
    }
}
