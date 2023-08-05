<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function get_user()
    {
        return response()->json([
            'user' => auth()->user(),
        ]);
    }
}
