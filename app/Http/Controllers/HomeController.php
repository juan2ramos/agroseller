<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Category;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

class HomeController extends Controller
{
    function index(Category $category){

        $categories = $category::all();
        return view('front.home',compact('categories'));
    }
}
