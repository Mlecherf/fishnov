<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Fishing;


class FishingController extends Controller
{
    public function get_all_fishing_dates()
    {
        $user = Auth::user();

        $allDate = Fishing::select('id_fishing', 'date')
                            ->where('id_user', $user->id)
                            ->get();

        return response()->json($allDate);

    }
}
