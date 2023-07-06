<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request, bool $isAdmin = true): RedirectResponse
    {
        $credentials = $request->validate([
            'user' => ['required'],
            'password' => ['required'],
            'admin' => [$isAdmin]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin')->with("success", __("Successfully logged in!"));
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->intended('admin')->with("success", "See you later");
    }

}
