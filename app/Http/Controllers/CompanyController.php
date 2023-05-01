<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{

    public function create_company (Request $request) {

        $company = New Company;
        $company->name_company = $request->name_company;
        $company->name_admin_company = $request->name_admin_company;
        $company->password_admin_company = Hash::make($request->password_admin_company);
        $company->save();

        return redirect('/')->with('new company', 'Company enregistrée !');
    }
    
}
