<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // No olvides importar el modelo User
use Illuminate\Support\Facades\Hash;
use Exception; // Importar la clase Exception para manejar los errores


use App\Http\Requests\CompradorRequest;

class UserController extends Controller
{
    public function store(Request $request)
{
    try {
        // Verifica si hay una imagen en el request y conviértela a binario
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $binary = file_get_contents($file->getRealPath());
        } else {
            $binary = null; // Si no se proporciona una imagen, maneja esto de acuerdo a tus necesidades
        }

        // Crear el usuario con los datos del request
        $user = new User();
        $user->id = $request->ci;
        $user->nombre = $request->nombre;
        $user->apePaterno = $request->apePaterno;
        $user->apeMaterno = $request->apeMaterno;
        $user->genero = $request->genero;
        $user->celular = $request->celular;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->fechaNac = $request->fechaNac;
        $user->foto = $binary;
        $user->save();  // Guarda el usuario en la base de datos

        // Retorna la respuesta de éxito con el ID o CI del usuario
        return (object) [
            'status' => 'success',
            'message' => 'Usuario creado correctamente',
            'user_id' => $user->id
        ];

    } catch (Exception $e) {
        // En caso de error, devuelve un objeto con el mensaje de error
        return (object) [
            'status' => 'error',
            'message' => $e->getMessage()
        ];
    }
}

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado', 'status' => 'error'], 404);
            }
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $binary = file_get_contents($file->getRealPath());
            } else {
                $binary = $user->foto ; // Si no se proporciona una imagen, maneja esto de acuerdo a tus necesidades
            }
            $user->nombre = $request->nombre;
            $user->apePaterno = $request->apePaterno;
            $user->apeMaterno = $request->apeMaterno;
            $user->genero = $request->genero;
            $user->celular = $request->celular;
            $user->email = $request->email;
            $user->fechaNac = $request->fechaNac;
            $user->foto = $binary;
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
