<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Mail;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $code = $this->genCode();
            auth()->user()->codeValidacion = $code;
            auth()->user()->save();
            Mail::to(auth()->user()->email)->send(new MyEmail(auth()->user()->nombre, $code ));
            return redirect()->route('validarCodigo');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    private function genCode(){
        // Genera un código aleatorio de 6 dígitos
        return rand(100000,999999);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
