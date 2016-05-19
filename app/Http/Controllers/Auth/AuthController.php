<?php

namespace Agrosellers\Http\Controllers\Auth;

use Agrosellers\User;
use Agrosellers\Entities\Provider;
use Agrosellers\Entities\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;
use Agrosellers\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
        ];
        return Validator::make($data,
            [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6|regex:/^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%·?¿()&*]).*$/|
                confirmed',
                'role_id' => 'required|numeric|between:3,4',
                'mobile_phone' => 'required|numeric',
            ],
            [
                'between' => 'Debes escoger que tipo de cliente eres',
                'password.regex' => 'Tu contraseña es muy débil, revisa las recomendaciones ',
                'mobile_phone.required' => 'EL campo teléfono es obligatorio ',
            ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => $data['role_id'],
        ]);

        $user->save();

        return $user;
    }

    public function loginPath()
    {
        return route('login');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return route('admin');
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        if($user->role_id == 3){
            $agent = Agent::with('providers')->get()->sortBy(function($agent){return $agent->providers()->count();})->first();
            $provider = new Provider;
            $provider->agent_id = $agent->id;
            $provider->user_id = $user->id;
            $provider->save();
        }
        else {
            Mail::send('emails.welcome', ['user' => $user], function ($m) use ($user) {
                $m->to($user->email, $user->name)->subject('Bienvenido!');
            });
        }

        auth()->loginUsingId($user->id);
        return redirect($this->redirectPath());
    }
}
