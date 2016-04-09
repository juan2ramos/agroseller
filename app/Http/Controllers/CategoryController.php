<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Subcategory;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::all();
        return view('back.categories', compact('categories'));

    }
    function newCategory(Request $request){


        $imageName = str_random(40) . '**' . $request->file('categoryImage')->getClientOriginalName();
        $category = new Category([
            'name' => $request->input('nameCategory'),
            'url_image' => $imageName,
        ]);

        $request->file('categoryImage')->move(base_path() . '/public/uploads/categories/', $imageName);

        $category->save();
        $categories = Category::all();
        return view('back.categories', compact('categories'));
    }
    function destroyCategory($id, Request $request){
        $category = Category::find($id);
        $category->delete();
        if ($request->ajax()) {
            return response()->json(compact('success'));
        }
        return response()->json(compact('success'));

    }
    function newSubcategory(Request $request){

        $imageName = str_random(40) . '**' . $request->file('subcategoryImage')->getClientOriginalName();
        $subcategory = new Subcategory([
            'categories_id' => $request->input('category'),
            'name' => $request->input('subcategory'),
        ]);
        $request->file('subcategoryImage')->move(base_path() . '/public/uploads/categories/', $imageName);

        $subcategory->url_image = $imageName;
        $subcategory->save();
        $categories = Category::all();
        return view('back.categories', compact('categories'));
    }
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
