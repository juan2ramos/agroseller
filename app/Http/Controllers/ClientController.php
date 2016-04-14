<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Client;
use Agrosellers\User;
use Illuminate\Http\Request;
use Agrosellers\Entities\Farm;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = Farm::all();
        return view('back.registerClientInformation', compact('farms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $client = new Client();
        $client->user_id = $user->id;
        $client->location = $request->location;
        $client->save();

        $farms = Farm::all();

        foreach($request->all() as $data){
            foreach($farms as $farm){
                if($data == $farm->id){
                    $getClient = Client::find($client->id);
                    $getFarm = Farm::find($farm->id);
                    $getFarm->clients()->save($getClient);
                }
            }
        }

        return redirect()->route('admin');
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