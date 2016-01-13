<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Subcategory;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;

class ProductController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));

    }
    function newProduct(){

    }

}
