<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailedFishing;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Fishing;
use App\Models\User;


class FishingController extends Controller
{

    public function add_fishing($id, Request $request)
    {

        $fishing = Fishing::create([
            'date' => $request->date,
            'id_user' => $id
        ]);
        $fishing->save();

        foreach($request->keys() as $key) {
            if ($key != 'date') {
                $detailedFishing = DetailedFishing::create([
                    'id_fishing' => $fishing->id,
                    'type_fish' => $key,
                    'quantity' => (int)$request->$key
                ]);
                $detailedFishing->save();
            }
        };

        $user = User::where('id', $id)->first();

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

    public function get_all_fishing_dates()
    {
        $user = Auth::user();

        $allDate = Fishing::select('id_fishing', 'date')
                            ->where('id_user', $user->id)
                            ->get();

        return response()->json($allDate);

    }
}
