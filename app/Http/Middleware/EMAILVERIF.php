<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EMAILVERIF
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
$utilizadador=session()->get('utilizadors');
if($utilizadador==null){
return redirect()->back()->withErrors('Erro: Not Login');


}else{
if($utilizadador->Email_veri!=null){

    return $next($request);


}
    }


}
}
