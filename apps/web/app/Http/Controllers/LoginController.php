<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function index(Request $request): View|Factory
    {
        return view('auth/login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        $request->flashExcept('password');

        return back()->withErrors([
            'email' => 'The provided credentials don\'t match',
        ]);
    }

    public function destroy(Request $request): RedirectResponse|Response
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($request->inertia()) {
            return Inertia::location(url()->route('home'));
        }

        return redirect('/home');
    }

    public function appStore(Request $request)
    {
        return request()->headers;
    }
}
