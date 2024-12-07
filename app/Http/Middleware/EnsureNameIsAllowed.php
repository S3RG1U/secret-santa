<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureNameIsAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $name = strtolower($request->session()->get('name')) ?? null;

        if (!in_array($name, ['ionela maxim', 'maxim ionela'])) {
            return redirect('/');
        }

        return $next($request);
    }
}
