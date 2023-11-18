<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use \Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'regrut' => [
                'required',
                'max:13',
                'unique:users,rut',
            ],            
            'name' => 'required|max:43',
            'regap' => 'required|max:35',
            'regam' => 'required|max:35',
            'email' => 'required|email|max:200|unique:users,email',
            'password' => 'required|max:200|confirmed', // La regla 'confirmed' verifica que 'password' coincida con 'password_confirmation'
        ],  [
            'regrut.required' => 'El campo RUT es obligatorio.',
            'regrut.max' => 'El campo RUT no puede tener más de :max caracteres.',
            'regrut.unique' => 'Este RUT ya está registrado',
            'name.required' => 'El campo Nombre es obligatorio.',
            'name.max' => 'El campo Nombre no puede tener más de :max caracteres.',
            'regap.required' => 'El campo Apellido Paterno es obligatorio.',
            'regap.max' => 'El campo Apellido Paterno no puede tener más de :max caracteres.',
            'regam.required' => 'El campo Apellido Materno es obligatorio.',
            'regam.max' => 'El campo Apellido Materno no puede tener más de :max caracteres.',
            'email.required' => 'El campo Correo Electrónico es obligatorio.',
            'email.email' => 'El campo Correo Electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El campo Correo Electrónico no puede tener más de :max caracteres.',
            'email.unique' => 'Esta dirección de correo electrónico ya está registrada',
            'password.required' => 'El campo Contraseña es obligatorio.',
            'password.max' => 'El campo Contraseña no puede tener más de :max caracteres.',
            'password.confirmed' => 'Las contraseñas deben coincidir',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        //dd($data);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'rut' => $data['regrut'],
            'apellido_paterno' => $data['regap'],
            'apellido_materno' => $data['regam'],
            'estado' => 1
        ]);
    }
}
