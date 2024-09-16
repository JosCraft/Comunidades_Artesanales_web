<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRol;

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
        return view('/admin/create_user');
    }

    public function store(Request $request)
    {
        $user = new UserController();
        $user->store($request);
        //regresar a la vista anterior con un mensaje de confirmación
        return  redirect()->back()->with('message', 'Usuario creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $user = new UserController();
        $user->update($request, $id);
        return redirect()->route('admin.gestion_usuario');
    }

    public function destroy($id)
    {
        $user = new UserController();
        $user->destroy($id);
        return redirect()->route('admin.gestion_usuario');
    }

}
