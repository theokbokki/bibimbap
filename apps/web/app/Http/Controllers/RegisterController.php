<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;
use Symfony\Component\HttpFoundation\JsonResponse;

class RegisterController extends Controller
{
    public function index(Request $request): ResponseFactory|Response
    {
        return inertia('Auth/Register', ['title' => 'Registration page of Bibimbap']);
    }

    public function store(Request $request)
    {
        $values = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($values);

        return inertia('Home', ['title' => 'Home page of Bibimbap']);
    }
}
