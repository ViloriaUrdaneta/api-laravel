<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\X_usuario;
use Illuminate\Support\Facades\Log;



class X_usuarioController extends Controller
{
    public function xusuario(){
        $xusuarios = X_usuario::all();
        return response()->json($xusuarios);
    }

    public function register(Request $request){
        
        $xusuario = new X_usuario();
        
        $xusuario->user_email = $request->email;
        $xusuario->user_pass = Hash::make($request->password);
        $xusuario->save();

        Auth::login($xusuario);
        $token = $xusuario->createToken("example");
        
        return response()->json($token);
    }


    public function login(Request $request){
        
        $response = ["status"=>0, "msg"=>""];

        $user_email = $request->email;
        $user_pass = $request->password;
        
        $xusuario = X_usuario::where('user_email', $user_email)->first();

        if($xusuario){
            if(Hash::check($user_pass, $xusuario->user_pass)){
                Auth::login($xusuario);
                $token = $xusuario->createToken("example");
                $response["status"] = 1;
                $response["msg"] = $token->plainTextToken;
                
            }else{
                $response["msg"] = "Invalid pasword";
            }
        }else {
            $response["msg"] = "User not found";
        }

        return response()->json($response);
    }


    public function logout(Request $request){
        
        Auth::logout();
    }
}

