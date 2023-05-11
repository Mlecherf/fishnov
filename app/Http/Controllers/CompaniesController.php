<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CompaniesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $allCompanies = Companies::all();
       
        return view('companies.index', compact('allCompanies','user'));
    }

    public function action(Request $request,$id){
        dd($request);
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
    }
}
