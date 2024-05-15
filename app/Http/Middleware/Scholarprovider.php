<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Scholarprovider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next) :Response
    {
        if (null === $request->user() || null === $request->user()->scholarprovider) {
            return redirect()->route('scholarprovider.create')
                             ->with('error', 'You need to register for Scholarprovider first!');
        }

        return $next($request);
    }
}
