<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RedirectController extends Controller
{
    public function index(Request $request): View|Factory|Redirector|RedirectResponse
    {
        if ($request->cookie('registrationComplete')) {
            return view('/redirect');
        }

        return redirect('/auth/register');
    }

    public function appRedirect(Request $request): Redirector|RedirectResponse
    {
        $payload = [
            'exp' => time() + 60,
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        return redirect('bibimbap://auth/login?token='.$token);
    }
}
