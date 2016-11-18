<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Budget;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jenssegers\Date\Date;

class BudgetController extends Controller
{
    public function show()
    {
        return view('front.budgets');
    }

    public function showBack()
    {

        $budgets = Auth::user()->budgets()->with(['productProviders'])->get();
        return view('back.budgets', compact('budgets'));
    }

    public function add()
    {

        if (empty($cart = Session::get('cart'))) {
            return back();
        }


        $data = [];
        foreach ($cart as $item) {
            $data[$item->id] = ['quantity' => $item->quantity];
        }
        $budget = new Budget();

        auth()->user()->budgets()->save($budget);

        $budget->productProviders()->attach($data);
        Session::flash('budget', 1);
        Session::flash('idBudget', $budget->id);
        Session::forget('cart');
        Session::forget('valueTotal');

        return view('front.budgets', ['budgetCreate' => true]);
    }

    public function download(Request $request)
    {

        $user = Auth::user();

        $budget = Budget::with(['productProviders'])->find($request->input('budget_id'));
        $date = new Date();
        $date = $date->format('l j F Y H:i:s');


        $view = view('pdf.invoice', compact('budget', 'user', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Agrosellers Nº ' . $budget->id . ' - cliente: ' . $user->name . '.pdf', array("Attachment" => 0));

    }
}
