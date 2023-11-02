<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\X_usuario;

class X_usuarioController extends Controller
{
    public function xusuario(){
        $xusuarios = X_usuario::all();
        return response()->json($xusuarios);
    }
}
