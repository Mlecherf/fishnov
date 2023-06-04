<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class CompanyController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $company = DB::table('company')
                     ->join('users', 'users.id_company', '=', 'company.id_company')
                     ->select('company.name_company', 'company.token_company')
                     ->get()[0];

        return view('company.index', compact('user', 'company'));
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

    public function create_company () {

        $user = Auth::user();

        return view('company.create', compact('user'));
    }

    public function add_company (Request $request) {
        $request->validate([
            'name_company' => ['required', 'string', 'max:255']
        ]);

        DB::transaction(function () use ($request) {
            $token = Str::random(10);
            while (Company::where('token_company', $token)->exists()) {
                $token = Str::random(10);
            }
        
            $company = Company::create([
                'name_company' => $request->name_company,
                'id_admin_company' => Auth::id(),
                'token_company' => $token
            ]);
            $company->save();
        
            $user = Auth::user();
            $user->id_company = $company->id;
            $user->is_admin = true;
            $user->save();
        });
            
        return redirect('/dashboard')->with('new company', 'Company enregistrée !');
    }
    
}
