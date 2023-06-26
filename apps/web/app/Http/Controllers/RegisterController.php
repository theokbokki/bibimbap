<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class RegisterController extends Controller
{
    public function index(Request $request): ResponseFactory|Response
    {
        return inertia('Auth/Register', ['title' => 'Registration page of Bibimbap']);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return response()->json([
            'message' => 'Registered',
        ]);
    }
}
