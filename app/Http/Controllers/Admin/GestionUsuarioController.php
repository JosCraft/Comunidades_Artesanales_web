<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRol;
use App\Http\Requests\UserRequest;

use App\Http\Controllers\CompradoresController;

class GestionUsuarioController extends Controller
{
    public function index()
    {
        $users = User::all();
        $rolesUser = UserRol::all();

        return view('/admin/gestion_usuario',['users'=>$users, 'rolesUser'=>$rolesUser]);
    }

    public function create_user()
    {
        return view('admin/user/create_user');
    }

    public function store(UserRequest $request)
    {
        // Almacenar el resultado de store en una variable
        $response = app(UserController::class)->store($request);  // Llamamos al método store del UserController

        // Verificar si fue un éxito o error
        if ($response->status === 'success') {
            app(CompradoresController::class)->store($response->user_id);
            $user = User::find($response->user_id);
            return view('admin/user/add_role')->with([
                'user' => $user,
                'message' => $response->message
            ]);
        } else {
            return redirect()->back()->with('error', 'Error al crear el usuario: ' . $response->message);
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin/user/edit_user', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {


        // Almacenar el resultado de update en una variable
        $response = app(UserController::class)->update($request, $id);

        if ($response->status === 'success') {
            return redirect()->route('admin.gestion_usuario')->with('message', 'Usuario actualizado correctamente');
        } else {
            return redirect()->route('admin.gestion_usuario')->with('error', 'Error al actualizar el usuario: ' . $response->message);
        }
    }

    public function destroy($id)
    {

        // Almacenar el resultado de destroy en una variable
        $response = app(UserController::class)->destroy($id);

        if ($response->status === 'success') {
            return redirect()->route('admin.gestion_usuario')->with('message', 'Usuario eliminado correctamente');
        } else {
            return redirect()->route('admin.gestion_usuario')->with('error', 'Error al eliminar el usuario: ' . $response->message);
        }
    }
}
