<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\User;
use Illuminate\Http\Request;
use Agrosellers\Http\Requests;
use Agrosellers\Entities\Category;

class UserController extends Controller
{
    private $roleName = [1=>'Super Administrador',2 => 'Administrador', 3 => 'Proveedor', 4 => 'Cliente'];

    function index()
    {
        $users = User::all();
        $roleName = $this->roleName;
        return view('admin.users', compact('users','roleName'));

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
