<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register(Request $request)
    {


        $is_user_created=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        if ($is_user_created && Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            $token = $request->user()->createToken($request->name)->plainTextToken;


            return  response(json_encode(['token' => $token]), 200);
        } else {
            $response = ["message" => "Invalid Username & Password"];
            return response(json_encode($response), 401)->header('Content-Type', 'application/json');
        }
    }



    public function logout(Request $request)
    {

        $request->user()->tokens()->delete();
        return response('', 204)->header('Content-Type', 'application/json');

    }
}
