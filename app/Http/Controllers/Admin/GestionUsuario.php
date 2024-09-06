<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CRUD\UserController;

class GestionUsuario extends Controller
{
    public function index()
    {
        return view('admin.gestion_usuario');
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
