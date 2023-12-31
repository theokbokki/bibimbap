<?php

namespace App\Http\Controllers;

use App\Models\RegistrationTokens;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(Request $request): View|Factory
    {
        return view('auth/register', ['token' => $request->get('token')]);
    }

    public function store(Request $request): View|Factory|Redirector|RedirectResponse
    {

        $values = $request->validate([
            'username' => 'required | min:4 | max:20',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
        ]);

        User::create($values);

        if ($request->has('token')) {
            $token = $request->get('token');

            if (RegistrationTokens::where('token', $token)->first()) {
                RegistrationTokens::where('token', $token)->delete();

                Cookie::queue('registrationComplete', true, 10);

                return redirect('/redirect');
            }
        }

        return redirect('auth/login');
    }

    public function check_app(Request $request)
    {
        $token = Str::random(32);

        RegistrationTokens::create(['token' => $token]);

        return $token;
    }
}
