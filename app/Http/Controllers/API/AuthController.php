<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required|string|max:50',
            'email'=>'required|string|email|max:50|unique:users',
            'password'=>'required|string|min:9'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors('Neispravna validacija'));
        }

        // Kreriramo usera ako je validacija uspesna
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['Uspesno ste se registrovali','data'=>$user,'access_token'=>$token,'token_type'=>'Bearer']);

    }


    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(['message'=>'Greska prilikom logovanja'],401);
        }

        $user = User::where('email',$request['email'])->firstOrFail();
        //plainTextToken nam vraca tekst samog tokena (string tokena)
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['poruka'=>'Zdravo '.$user->name.', dobro dosli', 'access_token'=>$token, 'token_type'=>'Bearer']);

    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return ['poruka'=>"Uspesno ste se odjavili!"];
    }
}
