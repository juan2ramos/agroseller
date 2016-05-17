<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Budget;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Session;

class BudgetController extends Controller
{
    public function show(){
        return view('front.budgets');
    }
    public function add(){
        if(empty($cart = Session::get('cart')) ){
            return back();
        }
        $data = [];
        foreach($cart as $item){
            $data[$item->id] = [ 'quantity' => $item->quantity];
        }
        $budget = new Budget();

        auth()->user()->budget()->save($budget);

        $budget->products()->attach($data);

        return view('front.budgets');
    }
}
