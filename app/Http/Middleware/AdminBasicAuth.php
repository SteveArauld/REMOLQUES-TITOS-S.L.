<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminBasicAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = config('admin.user');
        $pass = config('admin.password');

        if ($request->getUser() === $user && hash_equals((string) $pass, (string) $request->getPassword())) {
            return $next($request);
        }

        return response('Acceso restringido', 401, [
            'WWW-Authenticate' => 'Basic realm="Remolquestitos Admin"',
        ]);
    }
}
