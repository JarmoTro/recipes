<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function logout(Request $request){

        Auth::logout();

        return redirect("/");

    }

    function getLoginPage(Request $request){

        return view('login');

    }

    function login(Request $request){

        $inputs = $request->all();

        $validator = Validator::make($inputs, [
            'login_username' => 'required',
            'login_password' => 'required',
        ],
        [
            'login_username.required' => ['field' => ':attribute', 'message' => 'Username is required.'],
            'login_password.required' => ['field' => ':attribute', 'message' => 'Password is required.']
        ]);

        if(!$validator->passes()){
            return response()->json(["errors" => $validator->errors()->all()], 400);
        }

        $isAuthenticated = auth()->attempt(array('email' => $inputs['login_username'], 'password' => $inputs['login_password']));

        if(!$isAuthenticated){
            return response()->json(["error" => "Invalid credentials."], 401);
        }

        return response()->json(["message" => "Authenticated"], 200);
    }
}