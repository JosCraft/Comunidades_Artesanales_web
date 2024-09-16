<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // No olvides importar el modelo User
use Illuminate\Support\Facades\Hash;
use Exception; // Importar la clase Exception para manejar los errores

class UserController extends Controller
{
    public function store(Request $request)
    {
        try {
            $file = $request->file('foto');
            $binary = file_get_contents($file->getRealPath());

            $user = new User();
            $user->nombre = $request->nombre;
            $user->apePaterno = $request->apePaterno;
            $user->apeMaterno = $request->apeMaterno;
            $user->genero = $request->genero;
            $user->celular = $request->celular;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->fechaNac = $request->fechaNac;
            $user->foto = $binary;
            $user->save();

            return (object) ['status' => 'success', 'message' => 'Usuario creado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado', 'status' => 'error'], 404);
            }

            $user->nombre = $request->nombre;
            $user->apePaterno = $request->apePaterno;
            $user->apeMaterno = $request->apeMaterno;
            $user->genero = $request->genero;
            $user->celular = $request->celular;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->fechaNac = $request->fechaNac;
            $user->foto = $request->foto;
            $user->codeValidacion = $request->codeValidacion;
            $user->cantIntentos = $request->cantIntentos;
            $user->save();

            return (object) ['status' => 'success', 'message' => 'Usuario actualizado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado', 'status' => 'error'], 404);
            }

            $user->delete();

            return (object) ['status' => 'success', 'message' => 'Usuario eliminado correctamente'];
        } catch (Exception $e) {
            return (object) ['status' => 'error', 'message' => $e->getMessage()];
        }
    }
}
