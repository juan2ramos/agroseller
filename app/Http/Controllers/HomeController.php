<?php

namespace Agrosellers\Http\Controllers;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(CategoryController $categoryController){

        $categories = $categoryController->categoriesSubcategories();

        return view('front.home',compact('categories'));
    }
    function pricing(){

        return view('front.pricing');
    }
    function productDetail(){

        return view('front.productDetail');
    }
}
