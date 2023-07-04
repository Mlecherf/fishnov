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
        $globalArray = [];
        
        foreach($allFishings as $fishing)
        {
            $temp_array = DetailedFishing::where('id_fishing', $fishing->id_fishing)->get();
            if( count($temp_array)!= 0)
            {
                array_push($globalArray, $temp_array);
            }
        };

        return view('fishing.index', compact('globalArray'));
    }

    public function get_create()
    {
        $user = Auth::user();
        $fish = array(
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
        );
        return view('fishing.create', compact('fish'));
    }

    public function post_create(Request $request, $id)
    {

        $checkFishing= Fishing::where('date',$request->date[0])->get();

        if(count($checkFishing)!=0)
        {
            for ($i = 0; $i < count($request->type); $i++)
            {
                $detailed_fishing = DetailedFishing::create([
                    'id_fishing' => $checkFishing[0]->id_fishing,
                    'type_fish' => $request->type[$i],
                    'quantity' => $request->quantity[$i]
                ]);

                if ($detailed_fishing->isDirty())
                {
                    $detailed_fishing->save();
                }
            }

        } else {
            $fishing = Fishing::create([
                'date' => $request->date[0],
                'id_user' => $id,
            ]);
            for ($i = 0; $i < count($request->type); $i++)
            {
                $detailed_fishing = DetailedFishing::create([
                    'id_fishing' => $fishing->id_fishing,
                    'type_fish' => $request->type[$i],
                    'quantity' => $request->quantity[$i]
                ]);

                if ($detailed_fishing->isDirty())
                {
                    $detailed_fishing->save();
                }
            }

            if ($fishing->isDirty())
            {
                $fishing->save();
            }

           
        }

        return redirect('/fishings');
    }

}
