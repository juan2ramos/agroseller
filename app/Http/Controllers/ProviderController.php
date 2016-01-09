<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Category;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;

class ProviderController extends Controller
{

    function registerProvider()
    {
        $categories = Category::all();
        return view('admin.registerProvider', compact('categories'));
    }
    function insertProvider(Request $request){


        dd($request->input());
    }
}

