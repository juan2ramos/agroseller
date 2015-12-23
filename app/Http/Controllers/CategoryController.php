<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));

    }
    function newCategory(Request $request){

        $category = new Category([
            'name' => $request->input('nameCategory'),
        ]);
        $category->save();
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }
    function destroyCategory($id, Request $request){
        $category = Category::find($id);
        $category->delete();
        if ($request->ajax()) {
            return response()->json(compact('success'));
        }
        return response()->json(compact('success'));

    }
}
