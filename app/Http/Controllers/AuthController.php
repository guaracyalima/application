<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::first()->attributesToArray();

        $customClaims = ['name' => $user['name']];

        try
        {

            $token = JWTAuth::attempt($credentials, $customClaims);

            User::ge

        }
        catch (JWTException $exception)
        {
            return response()->json(['error' => 'Não foi possivel criar o token'], 500);
        }

        if(!$token)
        {
            return response()->json(['error' => 'Credenciais invalidas'], 401);
        }

        return response()->json(compact('token'));

    }
}
