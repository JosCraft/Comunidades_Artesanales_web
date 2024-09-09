<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

use Auth;
use Alert;

class UsuarioPerfilController extends Controller
{
    public function index()
    {
        return view('user/app');
    }

    public function update(){
        $user = Auth::user();
        return view('user/editarPerfil', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apePaterno' => 'required|string|max:255',
            'apeMaterno' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'celular' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'fechaNac' => 'required|date',
            'foto' => 'nullable|image|max:2048', // Hacemos que la imagen sea opcional
        ]);

        $user = Auth::user();
        $user->nombre = $request->nombre;
        $user->apePaterno = $request->apePaterno;
        $user->apeMaterno = $request->apeMaterno;
        $user->genero = $request->genero;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->fechaNac = $request->fechaNac;

        if ($request->hasFile('foto')) {
            $imageFile = $request->file('foto');
            $imageBinary = file_get_contents($imageFile->getRealPath());
            $user->foto = $imageBinary; // Solo si se sube una nueva imagen
        }

        $user->save();
        //retornar succes si se actualiza correctamente
        return redirect()->route('user')->with('success', 'Perfil actualizado correctamente');
    }
}
