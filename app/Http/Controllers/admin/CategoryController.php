<?php

namespace Agrosellers\Http\Controllers\admin;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Category;
use Agrosellers\Entities\Subcategory;


class CategoryController extends Controller
{
    function subcategoriesQuery(Request $request){
        $category = Category::find($request->input('id'));
        $subcategories = $category->subcategories()->get();
        if ($request->ajax()) {
            return response()->json(compact('subcategories'));
        }
    }
    function categoriesSubcategories(){
        return Category::all();
    }
    function featuresQuery(Request $request){
        $subCategory = Subcategory::find($request->input('id'));
        $features = $subCategory->features()->get();
        if ($request->ajax()) {
            return response()->json(compact('features'));
        }
    }
}
