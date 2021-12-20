<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ISADMIN
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
        if(session()->has('utilizadors')){
            $uti=session()->get('utilizadors');
            if(strcmp($uti->Type, 'Admin')==0){

                return $next($request);
            }
            return redirect()->back()->with('popup','Not Admin');

        }
        return redirect('/logI')->with('popup','Not Log In');

    }
}
