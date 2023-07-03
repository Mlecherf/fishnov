<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\DetailedFishing;
use App\Models\Fishing;
use Illuminate\Http\Request;
class FishingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allFishings = Fishing::where('id_user', $user->id)->get();
        $allDetails = [];
        
        foreach($allFishings as $fishing)
        {
            array_push($allDetails,DetailedFishing::where('id_fishing', $fishing->id_fishing)->get());
        };
        return view('fishing.index', compact('allDetails'));
    }

    public function get_create()
    {
        $user = Auth::user();
        $fish = [
            "Alligator Gar",
            "Amberjack",
            "Arapaima",
            "Arctic Char",
            "Asp",
            "Barracuda (Great)",
            "Barracuda (Pacific)",
            "Barramundi",
            "Bass (Australian)",
            "Bass (Largemouth)",
            "Bass (Peacock)",
            "Bass (Rainbow)",
            "Bass (Smallmouth)",
            "Bass (Spotted)",
            "Bass (Striped)",
            "Bass (White)",
            "Black Drum",
            "Black Jewfish",
            "Black Rockfish",
            "Bluefish",
        ];
        return view('fishing.create', compact('fish'));
    }

    public function post_create(Request $request, $id)
    {
        
        $request->validate([
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'quantity' => 'required|integer'
        ]);
        
        $fishing = Fishing::create([
            'date' => $request->date,
            'type' => $request->type,
            'id_user' => $id,
        ]);

        $detailed_fishing = DetailedFishing::create([
            'id_fishing' => $fishing->id,
            'type_fish' => $request->type,
            'quantity' => $request->quantity
        ]);

        if ($fishing->isDirty())
        {
            $fishing->save();
        }

        if ($detailed_fishing->isDirty())
        {
            $detailed_fishing->save();
        }

        return redirect('/fishings');
    }

}
