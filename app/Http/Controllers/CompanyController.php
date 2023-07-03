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
        $company = Company::where('id_company', $user->id_company)->first();
        return view('company.index', compact('user', 'company'));
    }

    public function action(Request $request,$id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = Auth::user();
    }

    public function get_create_company () {

        $user = Auth::user();

        return view('company.create', compact('user'));
    }

    public function post_create_company (Request $request) {
        $request->validate([
            'name_company' => ['required', 'string', 'max:255']
        ]);

        DB::transaction(function () use ($request) {
            $token = Str::random(10);
            while (Company::where(' token_company', $token)->exists()) {
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

    public function get_join_company () {

        return view('company.join');
    }

    public function post_join_company (Request $request) {

        $request->validate([
            'token_company' => ['required', 'string']
        ]);

        $user = Auth::user();
        $token = $request->token_company;

        if (Company::where('token_company', $token)->exists()) {

            $id_company = Company::select('id_company')
                                 ->where('token_company', $token)
                                 ->get()[0]['id_company'];

            $user->id_company = $id_company;
            $user->save();
        } else {
            return redirect()->route('company.join.get')->withErrors(['message' => 'Wrong token']);
        };

        return redirect('/dashboard');

    }

    public function post_update_company (Request $request, $id) {

        $request->validate([
            'name_company' => 'required|string|max:255',
        ]);

        $company = Company::where('id_company',$id)->first();
        $request->get('name_company') ? $company->name_company = $request->get('name_company') : '';
       
        if ($company->isDirty())
        {
            $company->save();
        }


        return redirect('/company');

    }
    
}
