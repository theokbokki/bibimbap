<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

class RootController extends Controller
{
    public function index(): ResponseFactory|Response
    {
        return inertia('Index', ['title' => 'Home page of the app']);
    }
}
