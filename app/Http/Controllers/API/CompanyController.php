<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{

    public function join_company (Request $request) {

        $request->validate([
            'id' => ['required'],
            'token_company' => ['required', 'string']
        ]);

        $user = User::where('id', $request['id'])->first();

        if ($user) {

            $company = Company::where('token_company', $request['token_company'])->first();

            if ($company) {
                
                $user->update([
                    'id_company' => (int)$company->id_company
                ]);

                $userTokens = $user->tokens;
                foreach ($userTokens as $token) {
                    $token->delete();
                }

                $token = $user->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'access_token' => $token,
                    'id' => $user->id,
                ]);

            } else {
                return response()->json(['error' => 'Company not find']);
            }

        } else {
            return response()->json(['error' => 'User not find']);
        }

    }

    public function get_company_info ($id) {

        $company = Company::where('id_company', $id)->first();

        if ($company) {
            return response()->json(
                $company
            );
        } else {
            return response()->json(['error' => 'Company not find.'], 404);
        }
    }
}
