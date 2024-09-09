<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeController extends Controller
{

    private function genCode(){
        // Genera un código aleatorio de 6 dígitos
        return rand(100000,999999);
    }



    public function validarCodigo()
    {
        return view('user/validation');
    }

    public function verificarCodigo(Request $request)
    {

        $digits = $request->input('digits');
        $codigoIngresado = implode('', $digits);

        if (auth()->user()->codeValidacion == $codigoIngresado) {
            auth()->user()->codeValidacion = null;
            auth()->user()->cantIntentos = 0;
            auth()->user()->save();
            //enviar un mensaje de sewaler que el codigo es correcto
            return redirect()->route('welcome', ['success' => 'Código correcto']);
        }
        return redirect()->back()->withErrors(['code' => 'El código es incorrecto']);
    }
}
