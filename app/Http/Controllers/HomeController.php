<?php

namespace Agrosellers\Http\Controllers;
use Agrosellers\Entities\ProductFile;
use Agrosellers\Entities\Subcategory;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Product;

class HomeController extends Controller
{
    function index(admin\CategoryController $categoryController){

        $categories = $categoryController->categoriesSubcategories();
        $products = Product::all();
        $subcategories = Subcategory::all();
        $images = ProductFile::whereRaw('extension = "jpg" or extension = "png"')->get();
        return view('front.home',compact('categories', 'products', 'subcategories', 'images'));
    }
    function pricing(){

        return view('front.pricing');
    }

    function indexContact(){
        return view('front.contactForm');
    }

    function postContact(Request $request){
        $this->validate($request, [
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'max:100',
            'message' => 'required|min:50'
        ]);

        $data = $request->all();

        Mail::send('emails.contact',$data, function($msg) use($data){
            $msg->from('luza.231@hotmail.com');
            $msg->to($data['email'], $data['name'])->subject($data['subject']);
        });

        $answer = "El mensaje se ha enviado satisfactoriamente, pronto nos contactaremos contigo";
        return view('front.contactForm', ['mensaje' => $answer]);
    }

    public function indexFaqs(){
        return view('front.faqs');
    }

    function searchBar(Request $request){
        //$Products = Product::select('name', 'slug')->with('productFiles')->where("name", "like", "%{$request->value}%")->limit(10)->get();
        //$Products = Product::with('productFiles')->select('name', 'slug', 'extension as productFiles')->get();
        //$Products = Product::with(['productFiles' => function($file){
        //    $file->whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->first();
        //}])->get();
        //$Products = Product::with('productFiles')->get();
        $prueba = ['name' => 'Santiago', 'slug' => 'slug-prueba'];
        //$Products = Product::select('name', 'slug')->where("name", "like", "%{$request->value}%")->limit(10)->get()->with('productFiles');
        $Products = Product::select('name', 'slug')
            ->where("name", "like", "%{$request->value}%")
            ->limit(10)
            ->get();
        /*
         *

        $products = [];

        foreach ($Products as $Product){
            $id = $Product->id;
            $name = $Product->name;
            $image = $Product->productFiles()->whereRaw('extension = "jpg" or extension = "png" or extension = "svg"')->first();
            $image = $image->name;

            $products[] = [
                'name'  => "{$name}",
                'icon'  => "/uploads/products/{$image}",
                'route' => "/producto/{$id}"
            ];

        }
*/
        if($request->ajax()){
            return response()->json(['products' => $Products]);
        }
    }
}