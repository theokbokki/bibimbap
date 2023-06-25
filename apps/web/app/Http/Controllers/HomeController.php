<?php

namespace App\Http\Controllers;

use Inertia\Response;
use Inertia\ResponseFactory;

class HomeController extends Controller
{
    public function index(): ResponseFactory|Response
    {
        return inertia('Home', ['title' => 'Home page of Bibimbap']);
    }
}
