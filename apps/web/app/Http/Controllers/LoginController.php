<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class LoginController extends Controller
{
    public function index(Request $request): ResponseFactory|Response
    {
        return inertia('Auth/Login', ['title' => 'Login page of Bibimbap']);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        return response()->json([
            'message' => 'Logged in',
        ]);
    }
}
