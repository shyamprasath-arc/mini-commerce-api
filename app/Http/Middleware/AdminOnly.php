<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header(key: 'X-ADMIN') !== 'true') {
            return response()->json(data: [
                'status' => false,
                'message' => 'Unauthorized'
            ], status: 401);
        }
        return $next($request);
    }
}
