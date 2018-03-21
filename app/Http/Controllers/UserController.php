<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        echo "register";
    }

    public function login(Request $request)
    {
        echo "login";
    }
}
