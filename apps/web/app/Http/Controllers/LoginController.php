<?php

namespace App\Http\Controllers;

use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
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
        $token = $request->bearerToken();

        if (empty($token)) {
            return response()->json(['message' => 'Token not provided'], 401);
        }

        $key = 'your_dummy_secret_key';

        try {
            $decoded = JWT::decode($token, new Key($key, 'HS256'));

            return 'success';
        } catch (ExpiredException $e) {
            // Handle token expiration...
            return response()->json(['message' => 'Token has expired'], 401);

        } catch (Exception $e) {
            // Handle other JWT exceptions or invalid tokens...
            return response()->json(['message' => 'Invalid token'], 401);
        }
    }
}
