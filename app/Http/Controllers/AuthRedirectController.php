<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class AuthRedirectController extends Controller
{
    public function redirect($subdomain, Request $request)
    {
        try {
            $token = JWTAuth::setToken($request->query('token'));
            $claims = $token->getPayload()->toArray();  // Get claims from the token
            $user = User::where('username', $claims['username'])->first();
            if (!Hash::check($claims['password'], $user->password)) {
                throw new Exception('Invalid credentials');
            }
            Auth::login($user);  // log in the user
        } catch (Exception $e) {
            return response()->json(['error' => 'Invalid token or credentials'], 401);
        }

        return redirect('/');
    }
}
