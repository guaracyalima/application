<?php

namespace App\Http\Controllers;

use App\Entities\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user =  User::where('email', $credentials['email'])->get()->toArray ();
        foreach ($user as $u)
        {
         $name = $u['name'];
         $email = $u['email'];
         $role = $u['type'];
         $id = $u['id'];
        }
        $customClaims = [
          'name' => $name,
          'email' => $email,
          'id' => $id,
          'role' => $role,
        ];

        try
        {
            $token = JWTAuth::attempt($credentials, $customClaims);

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

    public function getAuthenticatedUser()
    {

    	try {

    		if (! $user = JWTAuth::parseToken()->authenticate()) {
    			return response()->json(['user_not_found'], 404);
    		}

    	} catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

    		return response()->json(['token_expired'], $e->getStatusCode());

    	} catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

    		return response()->json(['token_invalid'], $e->getStatusCode());

    	} catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

    		return response()->json(['token_absent'], $e->getStatusCode());

    	}

    	// the token is valid and we have found the user via the sub claim
    	return response()->json(compact('user'));
    }
}
