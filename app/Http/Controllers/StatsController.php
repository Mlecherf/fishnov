<?php

namespace App\Http\Controllers;

use App\Models\DetailedFishing;
use App\Models\User;
use App\Models\Fishing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allTrawler = User::where('id_company', $user->id_company)->where('type', 'trawler')->get();
        $allManager = User::where('id_company', $user->id_company)->where('type', 'manager')->get();
        return view('stats.index', compact('allTrawler', 'allManager'));
    }

    public function details($id)
    {
        $detailedFishings = Fishing::where('id_user', $id)->get();
        return view('stats.details', compact('detailedFishings'));
    }
}
