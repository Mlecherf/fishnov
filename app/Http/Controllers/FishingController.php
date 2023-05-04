<?php

namespace App\Http\Controllers;

use App\Models\Fishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FishingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allFishings = Fishing::where('id_user', $user->id)->get();
        
        return view('fishing.index', compact('allFishings'));
    }
}
