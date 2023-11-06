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
        $xusuario->fcm_token = $request->fcmtoken;
        $xusuario->user_pass = Hash::make($request->password);
        $xusuario->last_login = now();
        $xusuario->save();

        Auth::login($xusuario);
        $token = $xusuario->createToken("example");
        
        return response()->json($token);
    }


    public function login(Request $request){
        
        $response = ["status" => 0, "msg" => "", "last_login" => null];

        $user_email = $request->email;
        $user_pass = $request->password;
        
        $xusuario = X_usuario::where('user_email', $user_email)->first();

        if($xusuario){
            if(Hash::check($user_pass, $xusuario->user_pass)){

                
                Auth::login($xusuario);

                $lastLogin = $xusuario->last_login;
                $xusuario->fcm_token = $request->fcmtoken;
                $xusuario->last_login = now();
                $xusuario->save();

                $token = $xusuario->createToken("example");
                $response["status"] = 1;
                $response["msg"] = $token->plainTextToken;
                $response["last_login"] = $lastLogin; 
                
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

