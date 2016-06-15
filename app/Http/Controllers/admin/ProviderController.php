<?php

namespace Agrosellers\Http\Controllers\admin;

use Agrosellers\Entities\Category;
use Agrosellers\Entities\Provider;
use Agrosellers\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    private $roleName = [1 => 'Super Administrador', 2 => 'Administrador', 3 => 'Proveedor', 4 => 'Cliente', 5 => 'Agente'];
    
    function registerProvider(){
        return view('back.specificProviderForm');
    }

    function showProviders()
    {
        $users = User::where('role_id', '=', 3)->with('provider')->paginate(10);
        $roleName = $this->roleName;
        $routeSearch = 'searchProvider';
        return view('back.provider', compact('users', 'roleName', 'routeSearch'));
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

    function productDetailPreview($array){
        return view('back.prueba', compact('array'));
    }
}
