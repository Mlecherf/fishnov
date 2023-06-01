<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // L'authentification a réussi
            $user = Auth::user();
    
            // Générer un jeton d'accès pour l'utilisateur
            #$token = $user->createToken('auth_token')->plainTextToken;
    
            // Supprimer les jetons précédents de l'utilisateur
            $user->tokens->delete();
    
            // Effectuer d'autres actions si nécessaire
    
            // Redirection ou autre traitement
            return redirect()->intended(RouteServiceProvider::HOME);
    
        } else {
            // L'authentification a échoué
            dd('Identifiants invalides');
        }
        

        
        /*
        dd('test');
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            dd('no');
        } else {
            dd('yes');
        }

        
        dd($request->authenticate());

        $request->session()->regenerate();


        
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
        
        dd($request->session());

        return redirect()->intended(RouteServiceProvider::HOME);
        */
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
