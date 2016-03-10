<?php

namespace Agrosellers\Http\Controllers;

use Agrosellers\Entities\Category;
use Agrosellers\Entities\Provider;
use Agrosellers\User;
use Illuminate\Http\Request;

use Agrosellers\Http\Requests;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProviderController extends Controller
{
    private $roleName = [1 => 'Super Administrador', 2 => 'Administrador', 3 => 'Proveedor', 4 => 'Cliente'];

    function registerProvider()
    {
        $categories = Category::all();

        if (Provider::find(Auth::user()->id)) {
            return view('admin.registerProvider', compact('categories'));
        } else {
            return view('admin.specificProviderForm');
        }
    }

    function showProviders()
    {

        $users = User::where('role_id', '=', 3)->with('provider')->paginate(10);
        $roleName = $this->roleName;
        $routeSearch = 'searchProvider';
        return view('admin.provider', compact('users', 'roleName', 'routeSearch'));
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

        return view('admin.users', compact('users', 'roleName', 'routeSearch', 'search'));

    }

    /*
    function insertProvider(Request $request)
    {
        $user = Auth::user();
        $this->validate(
            $request,
            [
                'location' => 'required',
                'address' => 'required',
                'contact' => 'required',
                'contact-phone' => 'required',
                'description' => 'required',
                'NIT' => 'required',
                'category' => 'required',
            ],
            [
                'location.required' => 'Debe agregar al menos una ubicación',
                'address.required' => 'La dirección es requerida',
                'contact.required' => 'El nombre de contacto es requerido',
                'contact-phone.required' => 'El Teléfono de contacto es requerido',
                'description.required' => 'La descripción es requerida',
                'NIT.required' => 'El número del NIT es requerido',
                'category.required' => 'Debe pertenecer al menos a una categoría',
            ]
        );

        $provider = new Provider($request->all());
        $user->provider()->save($provider);
        $provider->categories()->attach($request->input('category'));
        return redirect()->route('admin');
    }
    */

    function insertProvider(Request $request)
    {
        $user = Auth::user();
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
                'sales-manager-name' => 'required',
                'licence' => 'required',
                'logo' => 'required',
                'nick-name' => 'required',
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
                'sales-manager-name' => 'El nombre del director comercial es requerido',
                'licence' => 'Es necesario que adjunte su licencia de ventas',
                'logo' => 'Debe adjuntar el logo de la empresa',
                'nick-name' => 'Ingrese su User ID',
                'taxpayer' => 'El tipo de contribuyente es requerido',
            ]
        );

        $provider = new Provider($request->all());
        $user->provider()->save($provider);
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
