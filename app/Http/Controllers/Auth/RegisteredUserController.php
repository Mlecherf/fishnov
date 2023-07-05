<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255']
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'type' => $request->type,
            'registration_trawler' => $request->registration_trawler
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'registration_trawler' => 'string|max:255',
            'token_company' => 'nullable|string|max:255'
        ]);

        $authUser = Auth::user();
        $user = User::find($authUser->id);
        if($request->token_company != null) {
            $company = Company::where('token_company',$request->token_company)->first();
            $company->id_company ? $user->id_company = $company->id_company : '';
        }

        $request->get('first_name') ? $user->first_name = $request->get('first_name') : '';
        $request->get('last_name') ? $user->last_name = $request->get('last_name') : '';
        $request->get('email') ? $user->email = $request->get('email') : '';
        $request->get('registration_trawler') ? $user->registration_trawler = $request->get('registration_trawler') : '';
        
        if ($user->isDirty())
        {
            $user->save();
        }

        // return view
        return redirect(RouteServiceProvider::HOME);
    }

    /**
     * Handle an incoming registration request.
     *
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function delete($id)
    {
        $user = User::find($id);
        $user->id_company = null;
        if ($user->isDirty())
        {
            $user->save();
        }

        return redirect('/stats');
    }
}
