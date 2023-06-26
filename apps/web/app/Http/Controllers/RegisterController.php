<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class RegisterController extends Controller
{
    public function __invoke(Request $request): ResponseFactory|Response
    {
        return inertia('Auth/Register', ['title' => 'Registration page of Bibimbap']);
    }
}
