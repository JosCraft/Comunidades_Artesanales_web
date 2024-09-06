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


    public function store(Request $request)
    {
        $user = new UserController();
        $user->store($request);
        return redirect()->route('admin.gestion_usuario');
    }

    public function update(Request $request, $id)
    {
        $user = new UserController();
        $user->update($request, $id);
        return redirect()->route('admin.gestion_usuario');
    }

}
