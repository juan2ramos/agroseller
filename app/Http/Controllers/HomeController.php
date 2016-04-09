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
    function index(CategoryController $categoryController){

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
}
