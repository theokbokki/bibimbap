<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class LoginController extends Controller
{
    public function __invoke(Request $request): ResponseFactory|Response
    {
        return inertia('Auth/Login', ['title' => 'Login page of Bibimbap']);
    }
}
