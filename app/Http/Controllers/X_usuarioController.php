<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\X_usuario;


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

        //Auth::login($xusuario);
        
        return response()->json($xusuario);
    }


    public function login(Request $request){
        
        $response = ["status"=>0, "msg"=>""];
        $data = json_decode($request->getContent());
        $xusuario = X_usuario::where('user_email', $data->email)->first();

        if($xusuario){
            if(Hash::check($data->password, $xusuario->user_pass)){
                //$token = $xusuario->createToken("example");

                $response["status"] = 1;
                //$response["msg"] = $token->plainTextToken;
                $response["msg"] = $xusuario;
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


/**echo 'hola';
        
        $xusuario = new X_usuario();
        
        $xusuario->user_email = $request->email;
        $xusuario->user_pass = Hash::make($request->password);
        $xusuario->save();

        Auth::login($xusuario);
        
        return response()->json($xusuario); */