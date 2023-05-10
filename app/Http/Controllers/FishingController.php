<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DetailedFishing;
use App\Models\Fishing;

class FishingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allFishings = Fishing::where('id_user', $user->id)->get();
        $allDetails = [];
    
        foreach($allFishings as $fishing){
            // dd(DetailedFishing::where('id_fishing', $fishing->id_fishing)->get());
            array_push($allDetails,DetailedFishing::where('id_fishing', $fishing->id_fishing)->get());
        };
        
        $allDetails = $allDetails[0];
        return view('fishing.index', compact('allDetails'));
    }

}
