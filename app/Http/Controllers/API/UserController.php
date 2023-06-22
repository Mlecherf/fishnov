<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rules;
use App\Models\User;

class UserController extends Controller
{
    public function update_user($id, Request $request)
    {
        $request->validate([
            'password' => ['confirmed', Rules\Password::defaults()],
            'first_name' => ['string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'registration_trawler' => ['string', 'max:255']
        ]);

        $user = User::where('id', $request->id)->first();

        $userData = $request->only([
            'password',
            'first_name',
            'last_name',
            'registration_trawler'
        ]);

        $user->update($userData);

        $userTokens = $user->tokens;
        foreach ($userTokens as $token) {
            $token->delete();
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'id' => $user->id,
        ]);
    }

    public function get_user ($id) {

        $user = User::where('id', $id)->first();

        if ($user) {
            return response()->json(
                $user
            );
        } else {
            return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
        }
    }
}
