<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('username',$request->username)->first();
        if(!$user) return request('',404);
        if(!password_verify($request->password,$user->password)) return response('',401);
        $payload = [
            //'iss' => 'http://example.org',
            'sub' => time(),
            'nbf' => time() + 60*60+30
        ];
        $jwt = JWT::encode($payload, env('JWT_SECRET'),'HS256');
        return $jwt;
    }    
}
