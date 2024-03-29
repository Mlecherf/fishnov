<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\LoginRequest;


class AuthController extends Controller
{    

    public function login (LoginRequest $request) {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required']
        ]);
        
        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password) && $user->type == 'trawler') {

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'id' => $user->id
            ]);

        } else {
            return response()->json([
                'access_token' => '',
                'id' => 0
            ]);
        }
        
    }

    public function register (Request $request) {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'type' => $request->type,
            'registration_trawler' => $request->registration_trawler
        ]);

        event(new Registered($user));

        Auth::login($user);       
        
        $user_id = User::where('email', $request->email)->first();
        $token = $user_id->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'id' => $user_id->id
        ]);
    }
}
