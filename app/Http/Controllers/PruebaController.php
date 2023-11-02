<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Xusuario;
use Illuminate\Http\Request;



class XusuarioController extends Controller
{

    public function xusuario(Request $request){
        
        $xusuarios = Xusuario::all();
        return response()->json($xusuarios);
    }


};
