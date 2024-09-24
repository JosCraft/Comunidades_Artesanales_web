<?php

namespace App\Http\Controllers;

use App\Models\User;


class MovilController extends Controller
{
    public function index_user(){
        $users = User::all();
        return response()->json($users);
    }
}
