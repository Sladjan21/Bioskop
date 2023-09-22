<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Korisnik
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() == null) {
            return $next($request);
        }
        if (auth()->user()->Rola == "korisnik") {
            return $next($request);
        } else {
            return abort(403, 'Forbidden access');
            ;
        }
    }
}
