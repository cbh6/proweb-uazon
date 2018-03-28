<?php

namespace App\Http\Middleware;

use App\Helpers\JwtAuth;
use Closure;

class CheckJwtAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $hash = $request->header('Authorization', null);
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($hash);

        if ($checkToken) {
            return $next($request);
        } else {
            $data = array(
                'message' => 'Unauthorized. Not authenticated.',
                'status' => 'error',
                'code' => 401,
            );
            return response()->json($data, 401);
        }
    }
}
