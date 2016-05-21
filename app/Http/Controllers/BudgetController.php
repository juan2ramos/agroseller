<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Budget;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BudgetController extends Controller
{
    public function show(){
        return view('front.budgets');
    }
    public function showBack(){

        $budgets = Auth::user()->budgets()->has('products')->get();

        return view('back.budgets', compact('budgets'));
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

        auth()->user()->budgets()->save($budget);

        $budget->products()->attach($data);

        return view('front.budgets',['budgetCreate' => true]);
    }
    public function download(Request $request){


        $data = 'asdasdas';
        $date = date('Y-m-d');
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');

    }
}
