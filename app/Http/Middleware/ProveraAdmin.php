<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProveraAdmin
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
        $user = Auth::user();
        if($user == null)
        {
            return redirect()->back();
        }
        if($user == "korisnik")
        {
            return Redirect::back()->with("poruka","Niste autorizovani za ovo");
        }

        if($user->Rola == "admin")
        {
            return $next($request);
        }
        else
        {
            return Redirect::back()->with("poruka","Niste autorizovani za ovo");
        }
        
    }
}
