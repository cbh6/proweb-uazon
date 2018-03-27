<?php

namespace App\Http\Controllers;

use App\Helpers\JwtAuth;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);

        if ($checkToken) {
            echo "Authenticated -> Index de LibroController";
        } else {
            echo "Not authenticated -> Index de LibroController";
        }
    }
}
