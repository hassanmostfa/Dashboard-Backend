<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash ;
use App\Models\Person ;


class userController extends Controller
{
    function signup(Request $request){
        $user = new Person ;
        $user->name = $request->input('name') ;
        $user->email = $request->input('email') ;
        $user->password = Hash::make($request->input('password')) ;
        $user->save();
        return $request->input() ;
    }

    function login(Request $request){
        $user = Person::where('email', $request->email)->first() ;
        if(!$user || !Hash::check($request->password, $user->password)){
            return ["error" => "invalid email or password"];
        }
            return $user ;
    }
}
