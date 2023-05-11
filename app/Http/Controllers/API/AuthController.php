<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;


class AuthController extends Controller
{    

    public function formLogin () {
        return response()->json([
            'email' => '...',
            'password' => '...'
        ]);
    }

    public function login (LoginRequest $request) {
        
        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
        
    }
}
