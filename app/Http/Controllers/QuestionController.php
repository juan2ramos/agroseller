<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;
use Agrosellers\Entities\Question;
use Agrosellers\Entities\Product;
use Agrosellers\Entities\Text;

use Agrosellers\Http\Requests;

class QuestionController extends Controller
{
    function index(){
        $userId = auth()->user()->id;
        $products = Product::where('user_id', $userId)->get();
        //dd($products[0]->questions()->first()->texts()->get());
        return view('back.questions', compact('products'));
    }
}
