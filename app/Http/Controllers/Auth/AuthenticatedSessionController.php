<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


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

        $credentials = $request->only('username', 'password');


        $request->authenticate();

        $request->session()->regenerate();
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->status_user == 1) {
                Session::regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                Auth::logout();
                return Redirect::back()->withErrors(['error' => 'Maaf Akun Anda nonaktif, mohon hubungi Admin']);
            }
        } else {
            return Redirect::back()->withErrors(['username' => 'username atau kata sandi salah']);
        }
        

        // return redirect()->intended(RouteServiceProvider::HOME);
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
