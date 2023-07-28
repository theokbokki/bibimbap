<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
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

    public function store(StoreLoginRequest $request): RedirectResponse|string|array
    {
        $loggedIn = Auth::attempt($request->validated());

        if ($request->get('tauri_app')) {
            if ($loggedIn) {
                return ['success' => true];
            }

            return [
                'success' => false,
                'errors' => [
                    'email' => ['The provided credentials don\'t match'],
                ],
            ];
        }

        if ($loggedIn) {
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
}
