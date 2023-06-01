<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CompanyController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $allCompanies = Company::all();
       
        return view('company.index', compact('allCompanies','user'));
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

    public function create_company (Request $request) {

        $company = New Company;
        $company->name_company = $request->name_company;
        $company->id_admin_company = Auth::id();
        $token = Str::random(10);
        while (Company::where('token', $token)->exists()) {
            $token = Str::random(10);
        }
        $company->token_company = $token;
        $company->save();

        return redirect('/dashboard')->with('new company', 'Company enregistrée !');
    }
    
}
