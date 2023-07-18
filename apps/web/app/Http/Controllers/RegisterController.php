<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class RegisterController extends Controller
{
    public function index(Request $request): View|Factory
    {
        return view('auth/register');
    }

    public function store(Request $request): Redirector|RedirectResponse
    {
        $values = $request->validate([
            'username' => 'required | min:4 | max:20',
            'email' => 'required | email | unique:users',
            'password' => 'required | min:8',
        ]);

        User::create($values);

        return redirect('auth/login');
    }
}
