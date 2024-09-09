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
            'ci' => ['required', 'integer'],
            'nombre' => ['required', 'string', 'max:255'],
            'apePaterno' => ['required', 'string', 'max:255'],
            'apeMaterno' => ['required', 'string', 'max:255'],
            'genero' => ['required'],
            'celular' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // la passsword tiene que tener almenos 1 mayuscula 1 minuscula 1 numero y 1 caracter especial
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'fechaNac' => ['required', 'date'],
            'foto' => ['image'],
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
    // Check if 'foto' is present in the $data array and is a file
    if (isset($data['foto']) && $data['foto'] instanceof \Illuminate\Http\UploadedFile) {
        $imageFile = $data['foto'];
        $imageBinary = file_get_contents($imageFile->getRealPath());
        $data['foto'] = $imageBinary;
    } else {
        $data['foto'] = null;
    }

    return User::create([
        'id' => $data['ci'],
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
