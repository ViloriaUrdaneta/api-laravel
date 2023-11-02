<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class ApiController extends Controller
{
    public function users(Request $request){
        
        $users = User::all();
        return response()->json('holi');
    }

    

    public function register(Request $request){
        
        $user = new User();
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user);
        
        return response()->json($user);
    }


    public function login(Request $request){
        
        $response = ["status"=>0, "msg"=>""];
        $data = json_decode($request->getContent());
        $user = User::where('email', $data->email)->first();

        if($user){
            if(Hash::check($data->password, $user->password)){
                $token = $user->createToken("example");

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

