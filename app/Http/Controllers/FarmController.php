<?php

namespace Agrosellers\Http\Controllers;

use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Agrosellers\Entities\Farm;
use Agrosellers\Entities\FarmCategory;
use Validator;

class FarmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmCategories = FarmCategory::with('farms')->paginate(5);
        return view('back.farms', compact('farmCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), ['farmCategory' => 'required']);
        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);
        FarmCategory::create(['name' => $request->get('farmCategory')]);
        return redirect()->back();
    }

    public function farmCreate(Request $request){
        $validator = Validator::make($request->all(), ['farm' => 'required']);
        if($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);
        Farm::create([
            'name' => $request->get('farm'),
            'farm_category_id' => $request->get('farmCategory')
        ]);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
