<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Category;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\Role;
use Agrosellers\User;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    private $roleName = [];

    public function __construct()
    {
        $this->roleName = Role::all();
    }

    function registerProvider(){
        return view('back.specificProviderForm');
    }

    function showProviders()
    {
        $user = Auth::user();
        $agent = $user->agent;
/*
        if(Auth::user()->role_id == 4){
            $users = Provider::where('agent_id', '=', $agent->id)->paginate(10);
        }
        else{

            $users = User::where('role_id', '=', 3)->with('provider')->paginate(10);
        }
*/
        $providers = Provider::where('agent_id', '=', $agent->id)->paginate(10);

        $roleName = $this->roleName;
        $routeSearch = 'searchProvider';

        return view('back.provider', compact('providers', 'roleName', 'routeSearch'));
    }

    function searchProviders(Request $request)
    {
        $search = $request->input('search');

        $users = User::where('role_id', '=', 2)
            ->where(function ($query) use ($search) {
                $query->Where('name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', '=', $search)
                    ->orWhere('second_name', 'like', '%' . $search . '%')
                    ->orWhere('second_last_name', 'like', '%' . $search . '%')
                    ->orWhere('identification', 'like', '%' . $search . '%');
            })->paginate(50);
        $roleName = $this->roleName;
        $routeSearch = 'searchProvider';

        return view('back.users', compact('users', 'roleName', 'routeSearch', 'search'));

    }
    
    function insertProvider(Request $request)
    {
        $this->validate(
            $request,
            [
                'location' => 'required',
                'address' => 'required',
                'contact' => 'required',
                'contact-phone' => 'required',
                'description' => 'required',
                'NIT' => 'required',
                'company-name' => 'required',
                'licence' => 'required',
                'logo' => 'required',
                'taxpayer' => 'required',
            ],
            [
                'location.required' => 'Debe agregar al menos una ubicación',
                'address.required' => 'La dirección es requerida',
                'contact.required' => 'El nombre de contacto es requerido',
                'contact-phone.required' => 'El Teléfono de contacto es requerido',
                'description.required' => 'La descripción es requerida',
                'NIT.required' => 'El número del NIT es requerido',
                'company-name' => 'El nombre de la empresa es requerido',
                'licence' => 'Es necesario que adjunte su licencia de ventas',
                'logo' => 'Debe adjuntar el logo de la empresa',
                'taxpayer' => 'El tipo de contribuyente es requerido',
            ]
        );

        $user = Auth::user();
        $provider = Provider::where('user_id', '=', $user->id)->first();
        $files = $request->file();
        $provider->update($request->all());

        foreach ($files as $key => $file) {
            $fileName = str_random(40) . '**' . $request->file($key)->getClientOriginalName();
            $request->file($key)->move(base_path() . '/public/uploads/providers/', $fileName);
            $provider[$key] = $fileName;
        }

        $provider->save();
        return redirect()->route('admin');
    }

    function updateProvider($id, Request $request)
    {

        $userProvider = User::find($id);
        $userProvider->validate = ($userProvider->validate) ? 0 : 1;
        $userProvider->save();

        if ($request->ajax()) {
            return response()->json(['name' => $userProvider->validate]);
        }
        return response()->json(['name' => $userProvider->validate]);
    }
}
