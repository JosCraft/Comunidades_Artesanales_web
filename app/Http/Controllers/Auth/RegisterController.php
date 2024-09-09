<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    protected $redirectTo = '/';

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
            'id' => ['required', 'integer'],
            'nombre' => ['required', 'string', 'max:255'],
            'apePaterno' => ['required', 'string', 'max:255'],
            'apeMaterno' => ['required', 'string', 'max:255'],
            'genero' => ['required'],
            'celular' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fechaNac' => ['required', 'date'],
            'foto' => ['nullable','image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
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
        if (isset($data['foto'])) {
            $imageFile = $data['foto'];
            $imageBinary = file_get_contents($imageFile->getRealPath());
            $data['foto'] = $imageBinary;
        }

        else {
            $data['foto'] = null;
        }

        return User::create([
            'id' => $data['id'],
            'nombre' => $data['nombre'],
            'apePaterno' => $data['apePaterno'],
            'apeMaterno' => $data['apeMaterno'],
            'genero' => $data['genero'],
            'celular' => $data['celular'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fechaNac' => $data['fechaNac'],
            'foto' => $data['foto'],
        ]);
    }
}
